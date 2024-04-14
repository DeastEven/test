<?php



class GetImagesApi
{
  private $clientId;
  private $clientSecret;
  private $redirectUri;
  private $utmSource;


  public function __construct($clientId, $clientSecret, $redirectUri, $utmSource)
  {
    $this->clientId = $clientId;
    $this->clientSecret = $clientSecret;
    $this->redirectUri = $redirectUri;
    $this->utmSource = $utmSource;

    Unsplash\HttpClient::init([
      'applicationId' => $this->clientId,
      'secret'        => $this->clientSecret,
      'callbackUrl'   => $this->redirectUri,
      'utmSource'     => $this->utmSource
    ]);
  }

  public function getImages($search, $page = 1, $per_page, $orientation)
  {
    $response = Unsplash\Search::photos($search, $page,  $per_page, $orientation);
    $data = [];
    foreach ($response->results as $item) {
      $data[] = $item['urls']['full'];
    }
    set_transient('images_results', $data, 12 * HOUR_IN_SECONDS);

    return get_transient('images_results');
  }
}
