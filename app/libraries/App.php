<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 11/15/2018
 * Time: 12:37 AM
 */

namespace App\Libraries;


class App {
	/**
	 * Start the app
	 *
	 * @param $request
	 * @param Router $router
	 *
	 * @throws \Exception
	 */
	public function start( $request, Router $router ) {
		$route_param = $router->getMatchedParams( $request );
		//find route
		global $flag;
		if ( $route_param ) {
			//is controller Exists
			if ( class_exists( $route_param['controller'] ) ) {
				$controller_object = new $route_param['controller'];
				//is any middleware registered
				if ( $controller_object->middlewares == null ) {
					$router->dispatch( $controller_object, $route_param['action'], $route_param['arg'] );
				} else {
					foreach ( $controller_object->middlewares as $middleware ) {
						//if action is in middleware $only index
						if ( $middleware->isMethodRegistered( $route_param['action'] ) ) {
							if ( $middleware->execute() ) {
								//middleware clearance
								$flag = true;
								//$router->dispatch( $route_param['controller'], $route_param['action'], $route_param['arg'] );
							} else {
								$flag = false;
								//terminate the calling
								$middleware->terminate();
								break;
							}
						} else {
							$flag = true;
						}
					}

					if ( $flag ) {
						$router->dispatch( $controller_object, $route_param['action'], $route_param['arg'] );
					}
				}
			} else {
				throw new \Exception( "Controller class" . $route_param['controller'] . " not found" );
			}
		} else {
			throw new \Exception( 'No route matched.', 404 );
		}

	}

}