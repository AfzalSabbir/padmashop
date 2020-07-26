<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artisan;

class RootController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth:admin');
	} 

	public function index()
	{
		$active = 'root';
		return view('backend.pages.root.index', compact('active'));
	}

	public function create(Request $request)
	{
		/**
		 * Reading as array
		**/
		$data = $request->except(['_token']);

		if ($data['makeController'] == 'yes') {
			Artisan::call('make:controller', [
				'name' => 'Backend/'.preg_replace("/[\s+]/", "", ucwords(preg_replace("/[\-_]/", " ",  $data['fileDirectory']))).'Controller'
			]);
			session()->flash('type_', $data['fileType']);
			session()->flash('controller__', 'yes');
		} else if ($data['makeController'] == 'no') {
			session()->flash('type_', $data['fileType']);
			session()->flash('controller__', 'no');
		}
		/*
		 'make:migration', ['name' => 'migration_name']create_checkings_table
		 */
		if ($data['makeMigration'] == 'yes') {
			Artisan::call('make:migration', [
				'name' => 'create_'.strtolower(str_plural($data['fileDirectory'])).'_table'
			]);
			session()->flash('type_', $data['fileType']);
			session()->flash('migration__', 'yes');
		} else if ($data['makeMigration'] == 'no') {
			session()->flash('type_', $data['fileType']);
			session()->flash('migration__', 'no');
		}

		if ($data['fileType'] == 'oneClickAll' || $data['fileType'] == 'oneClickAllWithView') {
			if ($data['fileType'] == 'oneClickAll') {
				$fileTypes = array(
					'index' => 'index',
					'add' => 'add',
					'edit' => 'edit',
				);
				$fafaIcon = array(
					'index' => 'fa fa-table',
					'add' => 'fa fa-plus-square',
					'edit' => 'fa fa-pencil-square',
				);
			} else if ($data['fileType'] == 'oneClickAllWithView') {
				$fileTypes = array(
					'index' => 'index',
					'add' => 'add',
					'edit' => 'edit',
					'view' => 'view',
				);
				$fafaIcon = array(
					'index' => 'fa fa-table',
					'add' => 'fa fa-plus-square',
					'edit' => 'fa fa-pencil-square',
					'view' => 'fa fa-eye',
				);
			}
			foreach ($fileTypes as $key => $fileType) {
				$data['fileType'] = $fileType;
				$data['fileName'] = $fileType;
				$data['fafaCardHeader'] = $fafaIcon[$key];

				// Generating Language Tag
				$data['tagManagement'] = str_replace(' ', '_', strtolower($data['tagManagement']));

				// Processing
				$data['fileDirectory'] = strtolower($data['fileDirectory']);
				$data['langFolderDirectory'] = strtolower($data['langFolderDirectory']);

				/**
				 *	Checking if folder exists
				**/
				$parent = "resources/views/backend/pages";
				$dirname = $data['fileDirectory'];
				$filename = $parent . '/' . $dirname;
				if (!file_exists($filename . '/')) {
					mkdir($filename, 0777);
				}

				/**
				 *	Generating Desired type file to save
				**/
				$lines = file_get_contents($parent . '/root/defaults/' . $data['fileType'] . '.blade.php');

				$content = $lines;
				foreach ($data as $key => $value) {
					$content = str_replace('#' . $key . '#', $value, $content);
				}
				file_put_contents($parent . '/' . $data['fileDirectory'] . '/' . $data['fileName'] . '.blade.php', $content);
			}
			/**
			 *	All Done!!!
			**/
			$active = 'root';
			session()->flash('add_message', 'Added :)');
			session()->flash('root_done_', $data['fileDirectory']);
			return redirect()->route('admin.root.index', compact('active'));

		} else {

			// Generating Language Tag
			$data['tagManagement'] = str_replace(' ', '_', strtolower($data['tagManagement']));

			// Processing
			$data['fileDirectory'] = strtolower($data['fileDirectory']);
			$data['langFolderDirectory'] = strtolower($data['langFolderDirectory']);

			/**
			 *	Checking if folder exists
			**/
			$parent = "resources/views/backend/pages";
			$dirname = $data['fileDirectory'];
			$filename = $parent . '/' . $dirname;
			if (!file_exists($filename . '/')) {
				mkdir($filename, 0777);
			}

			/**
			 *	Changing [modal.blade.php] to [index.blade.php]
			**/
			//$data['fileName'] = 'index';

			/**
			 *	Generating Desired type file to save
			**/

			$lines = file_get_contents($parent . '/root/defaults/' . $data['fileType'] . '.blade.php');

			$content = $lines;
			foreach ($data as $key => $value) {
				$content = str_replace('#' . $key . '#', $value, $content);
			}
			file_put_contents($parent . '/' . $data['fileDirectory'] . '/' . $data['fileName'] . '.blade.php', $content);

			/**
			 *	All Done!!!
			**/
			$active = 'root';
			session()->flash('add_message', 'Added :)');
			session()->flash('root_done_', $data['fileDirectory']);
			return redirect()->route('admin.root.index', compact('active'));
		}
	}
}
