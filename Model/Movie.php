<?php 
	class Movie {

		private $id;
		private $name;
		private $rate;
		private $des;
		private $image;
		private $trailer;
		private $link;

		public function Movie($id, $year, $name, $timeline, $director, $rate, $des, $type, $image, $trailer, $link) {
			$this->id = $id;
			$this->year = $year;
			$this->name = $name;
			$this->timeline = $timeline;
			$this->director = $director;
			$this->rate = $rate;
			$this->des = $des;
			$this->image = $image;
			$this->trailer = $trailer;
			$this->link = $link;
		}
	}
?>