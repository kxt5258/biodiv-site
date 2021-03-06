<?php
/*
 * This file is part of the sfMapFishPlugin package.
 * (c) Camptocamp <info@camptocamp.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * LineString : a LineString geometry.
 *
 * @package    sfMapFishPlugin
 * @subpackage php_geojson
 * @author     Camptocamp <info@camptocamp.com>
 * @version
 */
class LinearRing extends LineString
{
  protected $geom_type = 'LinearRing';

  /**
   * Constructor
   *
   * @param array $positions The Point array
   */
  public function __construct(array $positions)
  {
    if (count($positions) > 1)
    {
      parent::__construct($positions);
    }
    else
    {
      throw new Exception("Linestring with less than two points");
    }
  }
}


?>