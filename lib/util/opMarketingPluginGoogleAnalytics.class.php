<?php

class opMarketingPluginGoogleAnalytics extends Googleanalytics
{
  protected $query = array();
  
  public function __construct($email, $password, $profileNo)
  {
    parent::__construct($email, $password);
    $this->setProfile('ga:'.$profileNo);
  }
  
  protected function setQuery($key, $value)
  {
    $this->query[$key] = urlencode($value);
  }
  
  protected function getQuery($key)
  {
    return isset($this->query[$key])?$this->query[$key] : false;
  }
  
  protected function resetQuery()
  {
    $this->query = array();
  }
  
  protected function setMetrics($metrics)
  {
    $this->setQuery('metrics', $metrics);
  }

  protected function setDimensions($dimensions)
  {
    $this->setQuery('dimensions', $dimensions);
  }
  
  protected function setFilters($filters)
  {
    $this->setQuery('filters', $filters);
  }
  
  protected function getReports()
  {
    return $this->getReport($this->query);
  }
  
  public function getMostAccessed($startDate, $endDate, $best = 5)
  {
    $this->setDateRange($startDate, $endDate);
    $this->setMetrics('ga:pageviews,ga:visits,ga:visitors');
    $this->setDimensions('ga:pagePath');
    $this->setQuery('sort', '-ga:pageviews');
    
    $res = $this->getReports();
    $list = array();
    foreach($res as $key => $row)
    {
      $pagePath = $key;
      $array = array();
      $array['pagePath'] = $pagePath;
      $array['pageview'] = $row['ga:pageviews'];
      $array['visit'] = $row['ga:visits'];
      $array['uniqueuser'] = $row['visitors'];
      
      $list[] = $array;
    }
    return $list;
  }
}