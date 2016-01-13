<?php 

namespace App\Libraries\Extensions\ImageManagement;

use File;
use Image;
class ImageManagement {

	private $width = 860;
	private $height = 645;

	/**
	 * The path of cache folder for image upload
	 *
	 * @var String
	 */
	private $cache_path = 'cache_ads_images';

	/**
	 * Path of watermark image
	 *
	 * @var Image
	 */
	private $watermark = 'img/watermark.png';

	private $path_relative = 'cache_ads_images';



	function __construct(){
		$this->cache_path = public_path($this->cache_path);
		$this->watermark = Image::make(public_path($this->watermark))->opacity(40);
	}

	public function upload_image(Array $images){
		$list_image = array();
		$path = $this->generate_path(); 

		foreach($images as $key => $image)
		{
			if(is_null($image))
				continue;

			$name = uniqid().'.jpg';
			$image->move($this->cache_path, $name);
		
			$img = Image::make($this->cache_path.'/'.$name);

			$this->save_resize($img, $path.'/'.$name);



			$list_image[] = $this->path_relative.'/'.$name;
		}

		return $list_image;	

	}

	public function save_resize($img, $path){
	
		$width = $img->width();
		$height = $img->height();

		if($width < $height){
			$ratio_diff = $height / $this->height;
			$width = $this->width * $ratio_diff;
		}else{
			$ratio_diff = $width / $this->width;
			$height = $this->height * $ratio_diff;		
		}

		Image::canvas($width, $height, '#FFFFFF')
			->insert($img, 'center')
			->resize($this->width, $this->height)
			->insert($this->watermark , 'bottom-right', 40, 40)
			->save($path, 60);
	}

	public function generate_path(){
		$date = '/'.date('y-m-d');

		$this->path_relative.= $date;
		$folder = $this->cache_path.'/'.date('y-m-d');
		
		if(!File::exists($folder))
			File::makeDirectory($folder, 0775);

		$hour = '/'.date('H');
		$folder.=$hour;
		$this->path_relative.= $hour;

		if(!File::exists($folder))
			File::makeDirectory($folder, 0775);

		return $folder;
	}

	/*
			if($key == 0){
				$namemin = uniqid().'.jpg';

	
				Image::make($path.'/'.$name)
				
					->resize(null, 150, function ($constraint) {
	    				$constraint->aspectRatio();
					})
					->resize(190, null, function ($constraint) {
	    				$constraint->aspectRatio();
					})
					->insert($watermark , 'bottom-right', 40, 40)
					->save($folder.'/'.$namemin);

				$list_image[] = $folder.'/'.$namemin;

			}*/

}