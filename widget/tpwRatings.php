<?php

/**
 * Class tpwRatings fetches the ratings from API and calls the template to display the widget
 * @author Weblab.nl - Zainescu Traian
 */

class tpwRatings {

    /**
     * @int The company id
     */
    private $companyId;

    /**
     * @tpwCache The cache manager
     */
    private $cacheManager;


    /**
     * Constructor - init the cache manager and reads the companyId from App Config
     */
    public function __construct () {
        $this->cacheManager = new tpwCache();
        $this->companyId = tpwHelpers::getCompanyIdFromKey();
    }


    /**
     * Query the TPW API service in order to get the ratings data
     * @return array|bool|mixed
     */
    private function getCompanyRatings() {

        //try returning data from cache
        $cachedData = $this->cacheManager->readFromCache();
        if ( $cachedData ) {
            return $cachedData;
        }

        //read data from API
        $variant = get_option('tpw_variant',"light");
        $apiUrl = 'https://api.theperfectwedding.nl/companies/widget/' . $this->companyId . "?variant=$variant";

        $apiResponse = tpwHelpers::curlGet($apiUrl);

        if ( !$apiResponse ) {
            return false;
        }

        //try to decode API response
        $decodedApiResponse = json_decode( $apiResponse );

        //if we can not decode the API response return false
        if ( !$decodedApiResponse ) {
            return false;
        }

        //write fetched data to cache
        $this->cacheManager->writeCache( $apiResponse );

        return $decodedApiResponse;
    }


    /**
     * Call the method to render the company ratings and render the widget frontend template
     * @return bool
     */
    public function renderRatings() {

        //fetch company ratings
        $ratingsData = $this->getCompanyRatings();

        //if failed fetching company ratings return false
        if ( !$ratingsData ) {
            return false;
        }

        //extract the average rating and the ratingsCount
        $companyName = $ratingsData->companies_widget[0]->name;
        $averageRating = $ratingsData->companies_widget[0]->average_rating;
        $ratingsCount = $ratingsData->companies_widget[0]->rating_count;
        $widgetCode = $ratingsData->companies_widget[0]->widget_code;
        $profileUrl = $ratingsData->companies_widget[0]->profile_url;

        //call and display the frontend template
        include( 'tpwWidgetFrontendTemplate.php' );
    }


}