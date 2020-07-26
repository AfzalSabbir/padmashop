<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	} 

	
	public function insert(Request $request)
	{

		// read file
		// $myfile = fopen("resources/lang/bn/backend/all_bn.php", "r") or die("Unable to open file!");
		// echo fread($myfile,filesize("resources/lang/bn/backend/all_bn.php"));
		// fclose($myfile);
		
		for ($i=0; $i < 2; $i++) {
			if ($i == 0) {
				$type = 'bn';
			} else {
				$type = 'en';
			}
			// load the data and delete the line from the array 
			$lines = array_values(array_unique(file('resources/lang/'.$type.'/'.$request->place.'/'.$request->name.'.php')));
			$total_line = sizeof($lines);
			$total_line --;
			if ($lines[$total_line] == "];\r\n") {
				$lines[$total_line] = "];";
			}
			$last = sizeof($lines) - 1; 
			unset($lines[$last]);

			// write the new data to the file 
			$fp = fopen('resources/lang/'.$type.'/'.$request->place.'/'.$request->name.'.php', 'w'); 
			fwrite($fp, implode('', $lines)); 
			fclose($fp);
			$txt = "'".$request->tag."' => '".$request->$type."',\n];";

			$myfile = file_put_contents('resources/lang/'.$type.'/'.$request->place.'/'.$request->name.'.php', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
		}
		$active = 1;
		//session()->flash('success_message', $request->tag.' saved in '.'/'.$request->place.'/'.$request->name.'.php"');
		session()->flash('add_message', 'Added');
		return view('backend/pages/language/bn-en', compact('active'));
	}
	public function language()
	{
		$active = 1;
		return view('backend/pages/language/bn-en', compact('active'));
	}
	public function create(Request $request)
	{
		$content = "<?php\n\nreturn [\n];";

		$fp = fopen('resources/lang/bn/'.$request->place.'/'.$request->name.'.php','wb');
		fwrite($fp,$content);
		fclose($fp);

		$fp = fopen('resources/lang/en/'.$request->place.'/'.$request->name.'.php','wb');
		fwrite($fp,$content);
		fclose($fp);

		$active = 1;
		//session()->flash('success_message', 'File Created Successfully');
		session()->flash('add_message', 'Added');
		return redirect()->route('admin.language.bn_en', compact('active'));
	}
}
