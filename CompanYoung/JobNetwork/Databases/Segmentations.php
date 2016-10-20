<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Segmentations
{
    private $organizationId = 0;

    function __construct($organizationId)
    {
        $this->organizationId = $organizationId;
    }

    /**
     * New Segmentation
     *
     * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
     * @param array $data
     * @return array
     */
    public function all()
    {
        return Call::communicate('GET', [
            "organizations/$this->organizationId/segmentations" => []
        ]);
    }

    public function segmentationByType($type)
    {
        return Call::communicate('GET', [
            "organizations/$this->organizationId/segmentations-by-type" => ['type' => $type]
        ]);
    }


    public function updateSegmentation($data)
    {
        return Call::communicate('PATCH', [
            "organizations/$this->organizationId/segmentations/update-segmentation" => $data
        ]);
    }


    /**
     * New Segmentation
     *
     * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
     * @param array $data
     * @return array
     */
    public function newSegmentation($data)
    {
        return Call::communicate('POST', [
            "organizations/$this->organizationId/segmentations/new-segmentation" => $data
        ]);
    }

    public function showSegmentation($data)
    {

        return Call::communicate('GET', [
            "organizations/$this->organizationId/segmentations/show" => $data
        ]);

    }


    /**
     * Show users from view ID or state
     *
     * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
     * @param array $data
     * @return array
     */
    public function asyncViewList($data)
    {

        return Call::communicate('GET', [
            "organizations/$this->organizationId/segmentations/user-view/users" => $data
        ]);

    }


    /**
     * Add Filter to a segmentation
     *
     * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
     * @param array $data
     * @return array
     */
    public function renameSegmentation($data)
    {
        return Call::communicate('POST', [
            "organizations/$this->organizationId/segmentations/rename" => $data
        ]);
    }


    /**
     * Add Filter to a segmentation
     *
     * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
     * @param array $data
     * @return array
     */
    public function saveFilter($data)
    {
        return Call::communicate('POST', [
            "organizations/$this->organizationId/segmentations/save-filter" => $data
        ]);
    }

    /**
     * Remove filter from a segmentation
     *
     * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
     * @param array $data
     * @return array
     */
    public function removeFilter($data)
    {
        return Call::communicate('DELETE', [
            "organizations/$this->organizationId/segmentations/remove-filter" => $data
        ]);
    }

    /**
     * Remove a segmentation
     *
     * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
     * @param array $data
     * @return array
     */
    public function removeView($data)
    {
        return Call::communicate('DELETE', [
            "organizations/$this->organizationId/segmentations/remove" => $data
        ]);
    }

    /**
     * Get all segmentation filters with type
     *
     * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
     * @param array $data
     * @return array
     */
    public function filtersByType($data)
    {
        return Call::communicate('GET', [
            "organizations/$this->organizationId/segmentations/filters-by-type" => $data
        ]);
    }

    /**
     * Get all segmentation filters with type
     *
     * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
     * @param array $data
     * @return array
     */
    public function getFilters($data)
    {
        return Call::communicate('GET', [
            "organizations/$this->organizationId/segmentations/filters" => $data
        ]);
    }

    /**
     * Get all array of data to the list
     *
     * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
     * @param array $data
     * @return array
     */
    public function getListData($data)
    {
        return Call::communicate('GET', [
            "organizations/$this->organizationId/segmentations/get-list-data" => $data
        ]);
    }




}