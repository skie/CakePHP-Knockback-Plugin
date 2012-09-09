<?php

App::uses('Inflector', 'Utility');

/*
 *	Prepare json data in way that understandable to backbone requirements
 *
 */
Class KnockbackComponent extends Component {
	
	private $_backbone = false;

/*
 * Sets the view to that of the json type
 *
 * @param $controller Controller
 * @return void
 */
	public function startup($controller) {
		if (!$controller->RequestHandler->isAjax()) {
			return;
		}
		$controller->view = 'Knockback./default/json';
	}

/*
 * Sets the parameters of the view escaping cake's default of
 * assigning them as a keyed multi-dimensional array.
 *
 * @param $controller Controller
 * @return void
 */
	public function beforeRender(&$controller) {
		if (!$controller->RequestHandler->isAjax()) {
			return;
		}
		$controllerName = $controller->request->params['controller'];
		$action = $controller->request->params['action'];
		$singular = Inflector::singularize($controllerName);
		$modelName = Inflector::camelize($singular);
		
		if ($action == 'index') {
			$param = $controllerName;
		} elseif ($action == 'add' || $action == 'edit') {
			$param = $singular;
		} elseif ($action == 'view') {
			$object = $singular;
		} elseif ($action == 'delete') {
			return;
		}
		
		if (!isset($object) && isset($param)) {
			if (isset($controller->viewVars[$param][0][$modelName])) {
				$controller->set('object', array_map(function($row) use ($modelName) {
					return $row[$modelName];
				}, $controller->viewVars[$param]));
			} elseif (isset($controller->viewVars[$param][$modelName])) {
				$controller->set('object', $controller->viewVars[$param][$modelName]);
			} else {
				$controller->set('object', $controller->viewVars[$param]);
			}
		} elseif(isset($object)) {
			$controller->set('object', $object);
		}
	}
	
}