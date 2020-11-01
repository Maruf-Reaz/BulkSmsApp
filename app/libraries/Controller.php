<?php
/**
 * Base Controller
 * Loads the models and Views
 * Date: 8/15/2018
 * Time: 3:27 PM
 */

namespace App\Libraries;

class Controller {
	/**
	 * @var list of middlewares
	 * */
	public $middlewares = [];

	/**
	 * ----Depricated----
	 * Load model
	 *
	 * @param Model $model
	 *
	 * @return string
	 * */
	public function model( $model ) {
		//Require model file
		require_once '../app/models/' . $model . '.php';
		$namespacedModel = "App\Models\\" . $model;

		//Instantiate the mode
		return new $namespacedModel();
	}

	/**
	 *Load the middlewares
	 *
	 * @param string|array
	 *
	 * @return $this
	 * @throws \Exception
	 */
	public function middleware( $middleware_names ) {
		$middlewares = is_array( $middleware_names ) ? $middleware_names : [ $middleware_names ];
		foreach ( $middlewares as $middleware ) {
			$namespace  = 'App\Middlewares\\';
			$class_name = $namespace . $middleware;
			if ( class_exists( $class_name ) ) {
				$middleware_object = new $class_name;
				//return $middleware_object;
				$this->middlewares[] = $middleware_object;

				return $this;
			} else {
				throw new \Exception( "Middleware class $middleware not found" );
			}
		}

	}

	/**
	 * @param $mthods
	 *
	 * @return Middleware
	 */
	public function only( $mthods ) {
		if ( $mthods ) {
			foreach ( $mthods as $method ) {
				end( $this->middlewares )->only[] = $method;
			}

			return end( $this->middlewares );
		}
	}

	public function except( $mthods ) {
		if ( $mthods ) {
			foreach ( $mthods as $method ) {
				end( $this->middlewares )->except[] = $method;
			}

			return end( $this->middlewares );
		}
	}

	public function all() {
		end( $this->middlewares )->only   = [];
		end( $this->middlewares )->except = [];

		return end( $this->middlewares );
	}

	/**
	 * Load View
	 * @example ../app/views/' . $view . '.php'
	 * @param @example ../app/views/' . $view . '.php'
	 * @param array $data
	 */
	public function view( $view, $data = [] ) {
		//Check for the view file
		if ( file_exists( '../app/views/' . $view . '.php' ) ) {
			require_once '../app/views/' . $view . '.php';
		} else {
			die( "View (" . $view . ") does not exists" );
		}
	}
}