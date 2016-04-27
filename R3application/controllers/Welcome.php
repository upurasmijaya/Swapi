<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		/*
		load menu kategori utama
		*/
		$data['menu'] = $this->r3->getAPI('http://swapi.co/api/');
		$data['menu'] = $this->r3->getJSON($data['menu']);
		$this->load->view('welcome_message', $data);
	}
	
	public function api()
	{
		/*
		load konten dari kategori
		*/
		$url = $this->input->post('url');
		$arr = $this->r3->getAPI($url);
		$arr = $this->r3->getJSON($arr);
		$path = $this->r3->getLastURL($url);
		$next = element('next', $arr);
		
		$results = '';
		
		foreach ($arr['results'] as $arr_item):
			
			$results .= '<div class="bs-callout bs-callout-info" id="callout-glyphicons-dont-mix">';
			switch ($path) {
				case 'people' :
					$results .= '<h4><a data-view="'.$arr_item['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr_item['name'].'</a></h4>
						<p>Gender : '.$arr_item['gender'].' | Height : '.$arr_item['gender'].' | Mass : '.$arr_item['gender'].'</p>
						';
					break;
				case 'planets' :
					$results .= '<h4><a data-view="'.$arr_item['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr_item['name'].'</a></h4>
						<p>Rotation Period : '.$arr_item['rotation_period'].' | Orbital Period : '.$arr_item['orbital_period'].' | Diameter : '.$arr_item['diameter'].'</p>
						';
					break;				
				case 'films' :
					$results .= '<h4><a data-view="'.$arr_item['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr_item['title'].'</a></h4>
						<p>'.$arr_item['opening_crawl'].'</p>
						<p>Episode : '.$arr_item['episode_id'].' | Director : '.$arr_item['director'].' | Producer : '.$arr_item['producer'].'</p>
						';
					break;				
				case 'species' :
					$results .= '<h4><a data-view="'.$arr_item['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr_item['name'].'</a></h4>
						<p>Classification : '.$arr_item['classification'].' | Designation : '.$arr_item['designation'].' | Avg. Lifespan : '.$arr_item['average_lifespan'].'</p>
						';
					break;				
				case 'vehicles' :
					$results .= '<h4><a data-view="'.$arr_item['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr_item['name'].'</a></h4>
						<p>Model : '.$arr_item['model'].' | Manufacturer : '.$arr_item['manufacturer'].' | Crew : '.$arr_item['crew'].'</p>
						';
					break;				
				case 'starships' :
					$results .= '<h4><a data-view="'.$arr_item['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr_item['name'].'</a></h4>
						<p>Model : '.$arr_item['model'].' | Manufacturer : '.$arr_item['manufacturer'].' | Crew : '.$arr_item['crew'].'</p>
						';
					break;				
			}
			
			$results .= '</div>';
		endforeach;
		
		echo $results;
		
		if (!is_null($next)) {echo '
		<div class="sideheader container" id="next" data-next="'.$next.'" onclick="popNext(this);"><span>LOAD MORE</span></div>
		';}

	}
	
	public function nextpage()
	{
		$url = $this->input->post('url');
		$arr = $this->r3->getAPI($url);
		$arr = $this->r3->getJSON($arr);
		$path = $this->r3->getLastURL($url);
		$next = element('next', $arr);
		
		$results = '';
		
		foreach ($arr['results'] as $arr_item):
			
			$results .= '<div class="bs-callout bs-callout-info" id="callout-glyphicons-dont-mix">';
			switch ($path) {
				case 'people' :
					$results .= '<h4><a data-view="'.$arr_item['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr_item['name'].'</a></h4>
						<p>Gender : '.$arr_item['gender'].' | Height : '.$arr_item['gender'].' | Mass : '.$arr_item['gender'].'</p>
						';
					break;
				case 'planets' :
					$results .= '<h4><a data-view="'.$arr_item['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr_item['name'].'</a></h4>
						<p>Rotation Period : '.$arr_item['rotation_period'].' | Orbital Period : '.$arr_item['orbital_period'].' | Diameter : '.$arr_item['diameter'].'</p>
						';
					break;				
				case 'films' :
					$results .= '<h4><a data-view="'.$arr_item['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr_item['title'].'</a></h4>
						<p>'.$arr_item['opening_crawl'].'</p>
						<p>Episode : '.$arr_item['episode_id'].' | Director : '.$arr_item['director'].' | Producer : '.$arr_item['producer'].'</p>
						';
					break;				
				case 'species' :
					$results .= '<h4><a data-view="'.$arr_item['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr_item['name'].'</a></h4>
						<p>Classification : '.$arr_item['classification'].' | Designation : '.$arr_item['designation'].' | Avg. Lifespan : '.$arr_item['average_lifespan'].'</p>
						';
					break;				
				case 'vehicles' :
					$results .= '<h4><a data-view="'.$arr_item['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr_item['name'].'</a></h4>
						<p>Model : '.$arr_item['model'].' | Manufacturer : '.$arr_item['manufacturer'].' | Crew : '.$arr_item['crew'].'</p>
						';
					break;				
				case 'starships' :
					$results .= '<h4><a data-view="'.$arr_item['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr_item['name'].'</a></h4>
						<p>Model : '.$arr_item['model'].' | Manufacturer : '.$arr_item['manufacturer'].' | Crew : '.$arr_item['crew'].'</p>
						';
					break;				
			}
			
			$results .= '</div>';
		endforeach;
		
		echo $results;
		
		if (!is_null($next)) {echo '
		<div class="sideheader container" id="next" data-next="'.$next.'" onclick="popNext(this);"><span>LOAD MORE</span></div>
		';}
	}
	
	public function view()
	{
		$url = $this->input->post('url');
		$arr = $this->r3->getAPI($url);
		$arr = $this->r3->getJSON($arr);
		$path = $this->r3->getLastURL($url,-2);
		
		$next = element('next', $arr);
		
		$result = '';
		
			switch ($path) {
				case 'people' :
					$title = '<h4><a data-view="'.$arr['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr['name'].'</a></h4>';
					$body = '
					<ul>
						<li>Height: '.$this->r3->intText($arr['height']).'</li>
						<li>Mass: '.$this->r3->intText($arr['mass']).'</li>
						<li>Hair Color: '.$arr['hair_color'].'</li>
						<li>Skin Color: '.$arr['skin_color'].'</li>
						<li>Eye Color: '.$arr['eye_color'].'</li>
						<li>Birth Year: '.$arr['birth_year'].'</li>
						<li>Gender: '.$arr['gender'].'</li>
						<li>Homeworld:: '.$arr['homeworld'].'</li>
						<li>Films
							<ul>
								'.$this->r3->parseLI($arr['films']).'
							</ul>
						</li>
						<li>Species
							<ul>
								'.$this->r3->parseLI($arr['species']).'
							</ul>
						</li>
						<li>Vehicles
							<ul>
								'.$this->r3->parseLI($arr['vehicles']).'
							</ul>
						</li>
						<li>Starships
							<ul>
								'.$this->r3->parseLI($arr['starships']).'
							</ul>
						</li>
					</ul>';
					break;
				case 'planets' :
					$title = '<h4><a data-view="'.$arr['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr['name'].'</a></h4>';
					$body = '
					<ul>
						<li>Rotation Period: '.$arr['rotation_period'].'</li>
						<li>Orbital Period: '.$arr['orbital_period'].'</li>
						<li>Diameter: '.$this->r3->intText($arr['diameter']).'</li>
						<li>Climate: '.$arr['climate'].'</li>
						<li>Gravity: '.$arr['gravity'].'</li>
						<li>Terrain: '.$arr['terrain'].'</li>
						<li>Surface Water: '.$arr['surface_water'].'</li>
						<li>Population:: '.$arr['population'].'</li>
						<li>Residents
							<ul>
								'.$this->r3->parseLI($arr['residents']).'
							</ul>
						</li>
						<li>Films
							<ul>
								'.$this->r3->parseLI($arr['films']).'
							</ul>
						</li>
					</ul>';
					break;				
				case 'films' :
					$title = '<h4><a data-view="'.$arr['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr['title'].'</a></h4>';
					$body = '
					<ul>
						<li>Episode ID: '.$arr['episode_id'].'</li>
						<li>Opening Crawl: '.$arr['opening_crawl'].'</li>
						<li>Director: '.$arr['director'].'</li>
						<li>Producer: '.$arr['producer'].'</li>
						<li>Release Date: '.$arr['release_date'].'</li>
						<li>Characters
							<ul>
								'.$this->r3->parseLI($arr['characters']).'
							</ul>
						</li>
						<li>Planets
							<ul>
								'.$this->r3->parseLI($arr['planets']).'
							</ul>
						</li>
						<li>Starships
							<ul>
								'.$this->r3->parseLI($arr['starships']).'
							</ul>
						</li>					
						<li>Vehicles
							<ul>
								'.$this->r3->parseLI($arr['vehicles']).'
							</ul>
						</li>					
						<li>Species
							<ul>
								'.$this->r3->parseLI($arr['species']).'
							</ul>
						</li>
					</ul>';
					break;				
				case 'species' :
					$title = '<h4><a data-view="'.$arr['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr['name'].'</a></h4>';
					$body = '
					<ul>
						<li>Classification: '.$arr['classification'].'</li>
						<li>Designation: '.$arr['designation'].'</li>
						<li>Average Height: '.$this->r3->intText($arr['average_height']).'</li>
						<li>Skin Colors: '.$arr['skin_colors'].'</li>
						<li>Hair Colors: '.$arr['hair_colors'].'</li>
						<li>Eye Colors: '.$arr['eye_colors'].'</li>
						<li>Average Lifespan: '.$this->r3->intText($arr['average_lifespan']).'</li>
						<li>Homeworld: '.$arr['homeworld'].'</li>
						<li>Language: '.$arr['language'].'</li>
						<li>People
							<ul>
								'.$this->r3->parseLI($arr['people']).'
							</ul>
						</li>
						<li>Films
							<ul>
								'.$this->r3->parseLI($arr['films']).'
							</ul>
						</li>
					</ul>';
					break;				
				case 'vehicles' :
					$title = '<h4><a data-view="'.$arr['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr['name'].'</a></h4>';
					$body = '
					<ul>
						<li>Model: '.$arr['model'].'</li>
						<li>Manufacturer: '.$arr['manufacturer'].'</li>
						<li>Cost In Credits: '.$arr['cost_in_credits'].'</li>
						<li>Length: '.$this->r3->intText($arr['length']).'</li>
						<li>Max Atmosphering Speed: '.$this->r3->intText($arr['max_atmosphering_speed']).'</li>
						<li>Crew: '.$this->r3->intText($arr['crew']).'</li>
						<li>Passengers: '.$this->r3->intText($arr['passengers']).'</li>
						<li>Cargo Capacity: '.$this->r3->intText($arr['cargo_capacity']).'</li>
						<li>Consumables: '.$arr['consumables'].'</li>
						<li>Vehicle Class: '.$arr['vehicle_class'].'</li>
						<li>Pilots
							<ul>
								'.$this->r3->parseLI($arr['pilots']).'
							</ul>
						</li>
						<li>Films
							<ul>
								'.$this->r3->parseLI($arr['films']).'
							</ul>
						</li>
					</ul>';
					break;				
				case 'starships' :
					$title = '<h4><a data-view="'.$arr['url'].'" data-target="#myModal" onclick="popView(this);">'.$arr['name'].'</a></h4>';
					$body = '
					<ul>
						<li>Model: '.$arr['model'].'</li>
						<li>Manufacturer: '.$arr['manufacturer'].'</li>
						<li>Cost In Credits: '.$this->r3->intText($arr['cost_in_credits'],0).'</li>
						<li>Length: '.$this->r3->intText($arr['length']).'</li>
						<li>Max Atmosphering Speed: '.$this->r3->intText($arr['max_atmosphering_speed']).'</li>
						<li>Crew: '.$this->r3->intText($arr['crew']).'</li>
						<li>Passengers: '.$this->r3->intText($arr['passengers']).'</li>
						<li>Cargo Capacity: '.$this->r3->intText($arr['cargo_capacity']).'</li>
						<li>Consumables: '.$arr['consumables'].'</li>
						<li>Hyperdrive Rating: '.$arr['hyperdrive_rating'].'</li>
						<li>MGLT: '.$arr['MGLT'].'</li>
						<li>Starship Class: '.$arr['starship_class'].'</li>
						<li>Pilots
							<ul>
								'.$this->r3->parseLI($arr['pilots']).'
							</ul>
						</li>
						<li>Films
							<ul>
								'.$this->r3->parseLI($arr['films']).'
							</ul>
						</li>
					</ul>';
					break;				
			}
		
		$result = '<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">'.$title.'</h4>
		  </div>
		  <div class="modal-body" id="myModalBody">
			'.$body.'
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>';
		echo $result;
		
		// if (!is_null($next)) {echo '<a id="next" href="#" class="btn btn-success" data-next="'.$next.'" onclick="popNext(this);">NEXT</a>';}

	}
}
