<?php

namespace lacueva\BlogBundle\Controller;

// vg->lacueva\BlogBundle\Controller (el completion works);
include_once 'ApiGator/ApiGator.php';

use ApiGator\ApiGator;
use Closure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


define('URL',  'https://www.snapengage.com/api/v2/');
define('ORG_ID', '6418107096367104' );
define('COMPLETE_URL', URL . ORG_ID);



// https://support.ladesk.com/840770-Complete-API-reference
class SnapEngageChatController extends Controller {

	//path: /Express51Conversations/index
	/**
	 * 
	 * @param Request $request
	 * @return Response
	 * 
	 */
	public function indexAction(Request $request) {

		/* @var $funcionDumpDeSymfony Closure */
		$funcionDumpDeSymfony = function ($json) {
			//transformamos el json en un Array.
			$arr = json_decode($json, true);
			//si tenemos response que el array apunte a ella.
			$arr = $arr['response'] ? $arr['response'] : $arr;

			return new Response(dump($arr));
		};


		//Hay una sección de reportes , voy a hacer un volcado de varios para ver cual interesa.
		//la a_ sería ApiGatorExpress51_REPORTS . 
		$ApigatorSpnapChat = new ApiGator('reports/agents', 'https://express51.ladesk.com/api/', '&apikey=10c54076befac3d7ba249637b9ee6a31', ["date_to=2017-01-01", "date_from=2015-01-01"]);
		$ApigatorSpnapChat->procesaResponseCon($funcionDumpDeSymfony);



		//NO ME BORRRES o renderiza , o mejor manda a alguien a renderizar...xd .
		return new Response('Extracción de datos de Api Rest de SnapEngageChatController');

	}

}