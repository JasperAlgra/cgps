<?php
/**
 * [Short description for file]
 *
 * [Long description for file (if any)...]
 *
 * @category   EuropeTrack 2.0
 * @package    EuropeTrack 2.0
 * @author     Jasper Algra <jasper@yarp-bv.nl>
 * @copyright  (C)Copyright 2015 YARP B.V.
 * @version    CVS: $Id:$
 * @since      3-12-2015 / 20:21
 */


namespace App\Http\Controllers\Graph;

use App\Http\Controllers\Controller;

class GraphController extends Controller
{

    public function __construct()
    {
//        $this->middleware('guest', ['except' => 'getLogout']);
    }

   public function view() {
       echo "ahoi";
   }
}
