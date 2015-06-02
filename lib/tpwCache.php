<?php


/**
 * Class tpwCache - handles the TPW Ratings Plugin caching
 * @author Weblab.nl - Traian Zainescu
 */

class tpwCache {

    /**
     * Check if we have cached data and if it did not expired
     * @return array|bool|mixed
     */
    public function readFromCache() {
        //read cache data
        $cacheData = get_transient(tpwConfig::CACHE_KEY);

        if (false === $cacheData){
            return false;
        }
        //return cache data
        return json_decode($cacheData);
    }

    /**
     *  Helper function to write the reviews data into cache
     * @param $reviewsData          JSON Representation of the reviews data
     */
    public function writeCache( $reviewsData ) {
        set_transient(tpwConfig::CACHE_KEY,$reviewsData,tpwConfig::CACHING_TIME);
    }


    /**
     * Clear cache data
     */
    public function clearCache() {
        delete_transient(tpwConfig::CACHE_KEY);
    }
}