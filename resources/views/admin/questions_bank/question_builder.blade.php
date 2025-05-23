@php
$toolbar_tools  = toolbar_tools();
$element_properties_meta    = element_properties_meta($chapters);
$tabs_options    = tabs_options();
$rand_id = rand(999,99999);

@endphp

<script src="/assets/default/js/admin/question-create.js?ver={{$rand_id}}"></script>
<link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
<section class="section form-class upload-path-rurera" data-question_save_type="update_builder_question" data-location="{{isset( $questionObj->id )? $questionObj->id : 0}}">
    <div class="section-body lms-quiz-create">
		<input type="hidden" name="question_id" value="{{isset( $questionObj->id )? $questionObj->id : 0 }}">
		<div>
									
									
									
									<div class="similarity-content-block mb-30">
									<ul class="nav" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active question-details-tab" id="question-tab" data-toggle="tab" data-target="#question" type="button" role="tab" aria-controls="Question" aria-selected="false">Question</button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link similarity-tab" id="Similarity-tab" data-toggle="tab" data-target="#Similarity" type="button" role="tab" aria-controls="Similarity" aria-selected="false">Settings</button>
										</li>
										<li class="nav-item rurera-hide" role="presentation">
											<button class="nav-link" id="review-tab" data-toggle="tab" data-target="#review" type="button" role="tab" aria-controls="review" aria-selected="true">Review</button>
										</li>
									</ul>
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active py-0 question-details-tab-data" id="question" role="tabpanel" aria-labelledby="question-tab">
										
											<div class="col-12 col-md-12">
									
												<div class="row">
												@php $question_status = ($questionObj->question_status != 'api_pending')? 'Generated' : ''; @endphp
												@php $question_status = ($questionObj->question_status == 'Hard reject')? 'Rejected' : $question_status; @endphp
												@if($question_status != '')
												<div class="col-12 col-md-12 api-question-status">
													
													@if($questionObj->question_status == 'Submit for review')
														<div class="alert alert-success" role="alert">
														<strong>Successful Question</strong>
														<p>Question has been successfully imported into the question bank, with question Id #{{$questionObj->id}}.</p>
														</div>
													@elseif($questionObj->question_status == 'Hard reject')
														<div class="alert alert-danger" role="alert">
														<strong>Question Rejected</strong>
														<p>This question did not meet the required quality standards and was rejected.</p>
														</div>
													@endif
													  
												</div>		
												@endif
												<div class="col-lg-12 col-md-12 col-12">
													<div class="form-group">
														<label class="input-label">Question Title</label>
														<input type="text" value="{{ isset( $question_title )? $question_title : old('title') }}"
															   name="question_title"
															   class="form-control @error('title')  is-invalid @enderror"
															   placeholder=""/>
														@error('title')
														<div class="invalid-feedback">
															{{ $message }}
														</div>
														@enderror
													</div>
												</div>
												<div class="col-lg-12 col-md-12 col-12 mb-30">
													<div class="hap-container">
														<div class="hap-content">
															<div class="hap-content-area">
																<div id="global-message-container">
																</div>
																<div class="hap-content-box">
																	<script>rureraform_gettingstarted_enable = "off";</script>
																	<div class="wrap rureraform-admin rureraform-admin-editor">
																		<div class="rureraform-form-editor">
																			<div class="rureraform-toolbars">
																				<div class="rureraform-header"></div>
																				<div class="rureraform-pages-bar">
																					<ul class="rureraform-pages-bar-items hide">
																						<li class="rureraform-pages-bar-item"
																							data-id="1"
																							data-name="Page"><label
																									onclick="return rureraform_pages_activate(this);">Page</label><span><a
																										href="#" data-type="page"
																										onclick="return rureraform_properties_open(this);"><i
																											class="fas fa-cog"></i></a><a
																										href="#"
																										class="rureraform-pages-bar-item-delete rureraform-pages-bar-item-delete-disabled"
																										onclick="return rureraform_pages_delete(this);"><i
																											class="fas fa-trash-alt"></i></a></span>
																						</li>
																					</ul>
																				</div>
																				<div class="rureraform-toolbar">
																					<ul class="rureraform-toolbar-list">
																						@php
																						foreach ($toolbar_tools as $key => $value) {
																							
																						if (array_key_exists('options', $value)) {
																							$classes = isset( $value['classes'] )? $value['classes'] : '';
																							$options_elements = isset( $value['options_elements'] )? $value['options_elements'] : array();
																							
																						echo '
																						<li class="rureraform-toolbar-tool-' . esc_html($value['type']) . ' '.$classes.'"
																							class="rureraform-toolbar-list-options"
																							data-type="' . esc_html($key) . '"
																							data-option="2"><a
																									href="#"
																									data-title="' . esc_html($value['title']) . '"><i
																										class="' . esc_html($value['icon']) . '"></i></a>
																							<ul class="' . esc_html($key) . '">';
																								foreach ($value['options'] as
																								$option_key =>
																								$option_value) {
																									
																								$data_options_elements = isset( $options_elements[$option_key] )? $options_elements[$option_key] : '';

																								echo '
																								<li data-type="' . esc_html($key) . '"
																									data-option="' . esc_html($option_key) . '" 
																									data-elements="' . esc_html($data_options_elements) . '"
																									><a href="#"
																												data-title="' . esc_html($value['title']) . '">'
																										. esc_html($option_value) .
																										'</a></li>
																								';
																								}
																								echo '
																							</ul>
																						</li>
																						';
																						} else {
																						$classes = isset( $value['classes'] )? $value['classes'] : '';
																						
																						$icon = '<i class="' . esc_html($value['icon']) . '"></i>';
																						if( isset( $value['icon_type'] ) && $value['icon_type'] == 'svg'){
																							$icon = '<img src="/assets/admin/img/tools-elements/' . esc_html($value['icon']) . '" width="15">';
																						}
																						
																						
																						echo '
																						<li class="rureraform-toolbar-tool-' . esc_html($value['type']) . ' '.$classes.'"
																							data-title="' . esc_html($value['title']) . '" data-type="' . esc_html($key) . '"><a
																									href="#"
																									title="' . esc_html($value['title']) . '">'.$icon.'</a>
																						</li>
																						';
																						}
																						}
																						@endphp

																					</ul>
																				</div>
																			</div>
																			<div class="rureraform-builder">
																				<div class="rureraform-form-global-style"></div>
																				<div id="rureraform-form-1"
																					class="rureraform-form rureraform-elements"
																					_data-parent="1" _data-parent-col="0"></div>
																			</div>
																		</div>
																		<iframe data-loading="false" id="rureraform-import-style-iframe"
																				name="rureraform-import-style-iframe" src="about:blank"
																				></iframe>
																		<form id="rureraform-import-style-form"
																			enctype="multipart/form-data"
																			method="post" target="rureraform-import-style-iframe"
																			action="http://baz.com/greenform/?page=rureraform&rureraform-action=import-style">
																			<input id="rureraform-import-style-file" type="file"
																				accept=".txt, .zip"
																				name="rureraform-file"
																				onchange="jQuery('#rureraform-import-style-iframe').attr('data-loading', 'true'); jQuery('#rureraform-import-style-form').submit();">
																		</form>
																		<div class="rureraform-admin-popup-overlay"
																			id="rureraform-element-properties-overlay"></div>

																		<div class="rureraform-fa-selector-overlay"></div>
																		<div class="rureraform-fa-selector">
																			<div class="rureraform-fa-selector-inner">
																				<div class="rureraform-fa-selector-header">
																					<a href="#" title="Close"
																					onclick="return rureraform_fa_selector_close();"><i
																								class="fas fa-times"></i></a>
																					<input type="text" placeholder="Search...">
																				</div>
																				<div class="rureraform-fa-selector-content">
																																	<span title="No icon"
																																		onclick="rureraform_fa_selector_set(this);"><i
																																				class=""></i></span><span
																							title="Star"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-star"></i></span><span
																							title="Star O"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-star-o"></i></span><span
																							title="Check"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-check"></i></span><span
																							title="Close"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-close"></i></span><span
																							title="Lock"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-lock"></i></span><span
																							title="Picture O"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-picture-o"></i></span><span
																							title="Upload"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-upload"></i></span><span
																							title="Download"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-download"></i></span><span
																							title="Calendar"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-calendar"></i></span><span
																							title="Clock O"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-clock-o"></i></span><span
																							title="Chevron Left"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-chevron-left"></i></span><span
																							title="Chevron Right"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-chevron-right"></i></span><span
																							title="Phone"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-phone"></i></span><span
																							title="Envelope"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-envelope"></i></span><span
																							title="Envelope O"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-envelope-o"></i></span><span
																							title="Pencil"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-pencil"></i></span><span
																							title="Angle Double Left"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-angle-double-left"></i></span><span
																							title="Angle Double Right"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-angle-double-right"></i></span><span
																							title="Spinner"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-spinner"></i></span><span
																							title="Smile O"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-smile-o"></i></span><span
																							title="Frown O"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-frown-o"></i></span><span
																							title="Meh O"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-meh-o"></i></span><span
																							title="Send"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-send"></i></span><span
																							title="Send O"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-send-o"></i></span><span
																							title="User"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-user"></i></span><span
																							title="User O"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-user-o"></i></span><span
																							title="Building O"
																							onclick="rureraform_fa_selector_set(this);"><i
																								class="rureraform-fa rureraform-fa-building-o"></i></span>
																				</div>
																			</div>
																		</div>


																		<div id="rureraform-global-message"></div>
																		<div class="rureraform-dialog-overlay"
																			id="rureraform-dialog-overlay"></div>
																		<div class="rureraform-dialog" id="rureraform-dialog">
																			<div class="rureraform-dialog-inner">
																				<div class="rureraform-dialog-title">
																					<a href="#" title="Close"
																					onclick="return rureraform_dialog_close();"><i
																								class="fas fa-times"></i></a>
																					<h3><i class="fas fa-cog"></i><label></label>
																					</h3>
																				</div>
																				<div class="rureraform-dialog-content">
																					<div class="rureraform-dialog-content-html">
																					</div>
																				</div>
																				<div class="rureraform-dialog-buttons">
																					<a class="rureraform-dialog-button rureraform-dialog-button-ok"
																					href="#"
																					onclick="return false;"><i
																								class="fas fa-check"></i><label></label></a>
																					<a class="rureraform-dialog-button rureraform-dialog-button-cancel"
																					href="#" onclick="return false;"><i
																								class="fas fa-times"></i><label></label></a>
																				</div>
																				<div class="rureraform-dialog-loading"><i
																							class="fas fa-spinner fa-spin"></i>
																				</div>
																			</div>
																		</div>
																		<input type="hidden" id="rureraform-id" value="3"/>
																		<script>
																			var rureraform_webfonts = ["ABeeZee", "Abel", "Abhaya Libre", "Abril Fatface", "Aclonica", "Acme", "Actor", "Adamina", "Advent Pro", "Aguafina Script", "Akronim", "Aladin", "Alata", "Alatsi", "Aldrich", "Alef", "Alegreya", "Alegreya Sans", "Alegreya Sans SC", "Alegreya SC", "Aleo", "Alex Brush", "Alfa Slab One", "Alice", "Alike", "Alike Angular", "Allan", "Allerta", "Allerta Stencil", "Allura", "Almarai", "Almendra", "Almendra Display", "Almendra SC", "Amarante", "Amaranth", "Amatic SC", "Amethysta", "Amiko", "Amiri", "Amita", "Anaheim", "Andada", "Andika", "Andika New Basic", "Angkor", "Annie Use Your Telescope", "Anonymous Pro", "Antic", "Antic Didone", "Antic Slab", "Anton", "Arapey", "Arbutus", "Arbutus Slab", "Architects Daughter", "Archivo", "Archivo Black", "Archivo Narrow", "Aref Ruqaa", "Arima Madurai", "Arimo", "Arizonia", "Armata", "Arsenal", "Artifika", "Arvo", "Arya", "Asap", "Asap Condensed", "Asar", "Asset", "Assistant", "Astloch", "Asul", "Athiti", "Atma", "Atomic Age", "Aubrey", "Audiowide", "Autour One", "Average", "Average Sans", "Averia Gruesa Libre", "Averia Libre", "Averia Sans Libre", "Averia Serif Libre", "B612", "B612 Mono", "Bad Script", "Bahiana", "Bahianita", "Bai Jamjuree", "Baloo 2", "Baloo Bhai 2", "Baloo Bhaina 2", "Baloo Chettan 2", "Baloo Da 2", "Baloo Paaji 2", "Baloo Tamma 2", "Baloo Tammudu 2", "Baloo Thambi 2", "Balsamiq Sans", "Balthazar", "Bangers", "Barlow", "Barlow Condensed", "Barlow Semi Condensed", "Barriecito", "Barrio", "Basic", "Baskervville", "Battambang", "Baumans", "Bayon", "Be Vietnam", "Bebas Neue", "Belgrano", "Bellefair", "Belleza", "Bellota", "Bellota Text", "BenchNine", "Bentham", "Berkshire Swash", "Beth Ellen", "Bevan", "Big Shoulders Display", "Big Shoulders Inline Display", "Big Shoulders Inline Text", "Big Shoulders Stencil Display", "Big Shoulders Stencil Text", "Big Shoulders Text", "Bigelow Rules", "Bigshot One", "Bilbo", "Bilbo Swash Caps", "BioRhyme", "BioRhyme Expanded", "Biryani", "Bitter", "Black And White Picture", "Black Han Sans", "Black Ops One", "Blinker", "Bodoni Moda", "Bokor", "Bonbon", "Boogaloo", "Bowlby One", "Bowlby One SC", "Brawler", "Bree Serif", "Bubblegum Sans", "Bubbler One", "Buda", "Buenard", "Bungee", "Bungee Hairline", "Bungee Inline", "Bungee Outline", "Bungee Shade", "Butcherman", "Butterfly Kids", "Cabin", "Cabin Condensed", "Cabin Sketch", "Caesar Dressing", "Cagliostro", "Cairo", "Caladea", "Calistoga", "Calligraffitti", "Cambay", "Cambo", "Candal", "Cantarell", "Cantata One", "Cantora One", "Capriola", "Cardo", "Carme", "Carrois Gothic", "Carrois Gothic SC", "Carter One", "Castoro", "Catamaran", "Caudex", "Caveat", "Caveat Brush", "Cedarville Cursive", "Ceviche One", "Chakra Petch", "Changa", "Changa One", "Chango", "Charm", "Charmonman", "Chathura", "Chau Philomene One", "Chela One", "Chelsea Market", "Chenla", "Cherry Cream Soda", "Cherry Swash", "Chewy", "Chicle", "Chilanka", "Chivo", "Chonburi", "Cinzel", "Cinzel Decorative", "Clicker Script", "Coda", "Coda Caption", "Codystar", "Coiny", "Combo", "Comfortaa", "Comic Neue", "Coming Soon", "Commissioner", "Concert One", "Condiment", "Content", "Contrail One", "Convergence", "Cookie", "Copse", "Corben", "Cormorant", "Cormorant Garamond", "Cormorant Infant", "Cormorant SC", "Cormorant Unicase", "Cormorant Upright", "Courgette", "Courier Prime", "Cousine", "Coustard", "Covered By Your Grace", "Crafty Girls", "Creepster", "Crete Round", "Crimson Pro", "Crimson Text", "Croissant One", "Crushed", "Cuprum", "Cute Font", "Cutive", "Cutive Mono", "Damion", "Dancing Script", "Dangrek", "Darker Grotesque", "David Libre", "Dawning of a New Day", "Days One", "Dekko", "Delius", "Delius Swash Caps", "Delius Unicase", "Della Respira", "Denk One", "Devonshire", "Dhurjati", "Didact Gothic", "Diplomata", "Diplomata SC", "DM Mono", "DM Sans", "DM Serif Display", "DM Serif Text", "Do Hyeon", "Dokdo", "Domine", "Donegal One", "Doppio One", "Dorsa", "Dosis", "Dr Sugiyama", "Duru Sans", "Dynalight", "Eagle Lake", "East Sea Dokdo", "Eater", "EB Garamond", "Economica", "Eczar", "El Messiri", "Electrolize", "Elsie", "Elsie Swash Caps", "Emblema One", "Emilys Candy", "Encode Sans", "Encode Sans Condensed", "Encode Sans Expanded", "Encode Sans Semi Condensed", "Encode Sans Semi Expanded", "Engagement", "Englebert", "Enriqueta", "Epilogue", "Erica One", "Esteban", "Euphoria Script", "Ewert", "Exo", "Exo 2", "Expletus Sans", "Fahkwang", "Fanwood Text", "Farro", "Farsan", "Fascinate", "Fascinate Inline", "Faster One", "Fasthand", "Fauna One", "Faustina", "Federant", "Federo", "Felipa", "Fenix", "Finger Paint", "Fira Code", "Fira Mono", "Fira Sans", "Fira Sans Condensed", "Fira Sans Extra Condensed", "Fjalla One", "Fjord One", "Flamenco", "Flavors", "Fondamento", "Fontdiner Swanky", "Forum", "Francois One", "Frank Ruhl Libre", "Fraunces", "Freckle Face", "Fredericka the Great", "Fredoka One", "Freehand", "Fresca", "Frijole", "Fruktur", "Fugaz One", "Gabriela", "Gaegu", "Gafata", "Galada", "Galdeano", "Galindo", "Gamja Flower", "Gayathri", "Gelasio", "Gentium Basic", "Gentium Book Basic", "Geo", "Geostar", "Geostar Fill", "Germania One", "GFS Didot", "GFS Neohellenic", "Gidugu", "Gilda Display", "Girassol", "Give You Glory", "Glass Antiqua", "Glegoo", "Gloria Hallelujah", "Goblin One", "Gochi Hand", "Goldman", "Gorditas", "Gothic A1", "Gotu", "Goudy Bookletter 1911", "Graduate", "Grand Hotel", "Grandstander", "Gravitas One", "Great Vibes", "Grenze", "Grenze Gotisch", "Griffy", "Gruppo", "Gudea", "Gugi", "Gupter", "Gurajada", "Habibi", "Hachi Maru Pop", "Halant", "Hammersmith One", "Hanalei", "Hanalei Fill", "Handlee", "Hanuman", "Happy Monkey", "Harmattan", "Headland One", "Heebo", "Henny Penny", "Hepta Slab", "Herr Von Muellerhoff", "Hi Melody", "Hind", "Hind Guntur", "Hind Madurai", "Hind Siliguri", "Hind Vadodara", "Holtwood One SC", "Homemade Apple", "Homenaje", "Ibarra Real Nova", "IBM Plex Mono", "IBM Plex Sans", "IBM Plex Sans Condensed", "IBM Plex Serif", "Iceberg", "Iceland", "IM Fell Double Pica", "IM Fell Double Pica SC", "IM Fell DW Pica", "IM Fell DW Pica SC", "IM Fell English", "IM Fell English SC", "IM Fell French Canon", "IM Fell French Canon SC", "IM Fell Great Primer", "IM Fell Great Primer SC", "Imbue", "Imprima", "Inconsolata", "Inder", "Indie Flower", "Inika", "Inknut Antiqua", "Inria Sans", "Inria Serif", "Inter", "Irish Grover", "Istok Web", "Italiana", "Italianno", "Itim", "Jacques Francois", "Jacques Francois Shadow", "Jaldi", "JetBrains Mono", "Jim Nightshade", "Jockey One", "Jolly Lodger", "Jomhuria", "Jomolhari", "Josefin Sans", "Josefin Slab", "Jost", "Joti One", "Jua", "Judson", "Julee", "Julius Sans One", "Junge", "Jura", "Just Another Hand", "Just Me Again Down Here", "K2D", "Kadwa", "Kalam", "Kameron", "Kanit", "Kantumruy", "Karla", "Karma", "Katibeh", "Kaushan Script", "Kavivanar", "Kavoon", "Kdam Thmor", "Keania One", "Kelly Slab", "Kenia", "Khand", "Khmer", "Khula", "Kirang Haerang", "Kite One", "Knewave", "Kodchasan", "KoHo", "Kosugi", "Kosugi Maru", "Kotta One", "Koulen", "Kranky", "Kreon", "Kristi", "Krona One", "Krub", "Kufam", "Kulim Park", "Kumar One", "Kumar One Outline", "Kumbh Sans", "Kurale", "La Belle Aurore", "Lacquer", "Laila", "Lakki Reddy", "Lalezar", "Lancelot", "Langar", "Lateef", "Lato", "League Script", "Leckerli One", "Ledger", "Lekton", "Lemon", "Lemonada", "Lexend Deca", "Lexend Exa", "Lexend Giga", "Lexend Mega", "Lexend Peta", "Lexend Tera", "Lexend Zetta", "Libre Barcode 128", "Libre Barcode 128 Text", "Libre Barcode 39", "Libre Barcode 39 Extended", "Libre Barcode 39 Extended Text", "Libre Barcode 39 Text", "Libre Barcode EAN13 Text", "Libre Baskerville", "Libre Caslon Display", "Libre Caslon Text", "Libre Franklin", "Life Savers", "Lilita One", "Lily Script One", "Limelight", "Linden Hill", "Literata", "Liu Jian Mao Cao", "Livvic", "Lobster", "Lobster Two", "Londrina Outline", "Londrina Shadow", "Londrina Sketch", "Londrina Solid", "Long Cang", "Lora", "Love Ya Like A Sister", "Loved by the King", "Lovers Quarrel", "Luckiest Guy", "Lusitana", "Lustria", "M PLUS 1p", "M PLUS Rounded 1c", "Ma Shan Zheng", "Macondo", "Macondo Swash Caps", "Mada", "Magra", "Maiden Orange", "Maitree", "Major Mono Display", "Mako", "Mali", "Mallanna", "Mandali", "Manjari", "Manrope", "Mansalva", "Manuale", "Marcellus", "Marcellus SC", "Marck Script", "Margarine", "Markazi Text", "Marko One", "Marmelad", "Martel", "Martel Sans", "Marvel", "Mate", "Mate SC", "Maven Pro", "McLaren", "Meddon", "MedievalSharp", "Medula One", "Meera Inimai", "Megrim", "Meie Script", "Merienda", "Merienda One", "Merriweather", "Merriweather Sans", "Metal", "Metal Mania", "Metamorphous", "Metrophobic", "Michroma", "Milonga", "Miltonian", "Miltonian Tattoo", "Mina", "Miniver", "Miriam Libre", "Mirza", "Miss Fajardose", "Mitr", "Modak", "Modern Antiqua", "Mogra", "Molengo", "Molle", "Monda", "Monofett", "Monoton", "Monsieur La Doulaise", "Montaga", "Montez", "Montserrat", "Montserrat Alternates", "Montserrat Subrayada", "Moul", "Moulpali", "Mountains of Christmas", "Mouse Memoirs", "Mr Bedfort", "Mr Dafoe", "Mr De Haviland", "Mrs Saint Delafield", "Mrs Sheppards", "Mukta", "Mukta Mahee", "Mukta Malar", "Mukta Vaani", "Mulish", "MuseoModerno", "Mystery Quest", "Nanum Brush Script", "Nanum Gothic", "Nanum Gothic Coding", "Nanum Myeongjo", "Nanum Pen Script", "Nerko One", "Neucha", "Neuton", "New Rocker", "News Cycle", "Niconne", "Niramit", "Nixie One", "Nobile", "Nokora", "Norican", "Nosifer", "Notable", "Nothing You Could Do", "Noticia Text", "Noto Sans", "Noto Sans HK", "Noto Sans JP", "Noto Sans KR", "Noto Sans SC", "Noto Sans TC", "Noto Serif", "Noto Serif JP", "Noto Serif KR", "Noto Serif SC", "Noto Serif TC", "Nova Cut", "Nova Flat", "Nova Mono", "Nova Oval", "Nova Round", "Nova Script", "Nova Slim", "Nova Square", "NTR", "Numans", "Nunito", "Nunito Sans", "Odibee Sans", "Odor Mean Chey", "Offside", "Old Standard TT", "Oldenburg", "Oleo Script", "Oleo Script Swash Caps", "Open Sans", "Open Sans Condensed", "Oranienbaum", "Orbitron", "Oregano", "Orienta", "Original Surfer", "Oswald", "Over the Rainbow", "Overlock", "Overlock SC", "Overpass", "Overpass Mono", "Ovo", "Oxanium", "Oxygen", "Oxygen Mono", "Pacifico", "Padauk", "Palanquin", "Palanquin Dark", "Pangolin", "Paprika", "Parisienne", "Passero One", "Passion One", "Pathway Gothic One", "Patrick Hand", "Patrick Hand SC", "Pattaya", "Patua One", "Pavanam", "Paytone One", "Peddana", "Peralta", "Permanent Marker", "Petit Formal Script", "Petrona", "Philosopher", "Piazzolla", "Piedra", "Pinyon Script", "Pirata One", "Plaster", "Play", "Playball", "Playfair Display", "Playfair Display SC", "Podkova", "Poiret One", "Poller One", "Poly", "Pompiere", "Pontano Sans", "Poor Story", "Poppins", "Port Lligat Sans", "Port Lligat Slab", "Potta One", "Pragati Narrow", "Prata", "Preahvihear", "Press Start 2P", "Pridi", "Princess Sofia", "Prociono", "Prompt", "Prosto One", "Proza Libre", "PT Mono", "PT Sans", "PT Sans Caption", "PT Sans Narrow", "PT Serif", "PT Serif Caption", "Public Sans", "Puritan", "Purple Purse", "Quando", "Quantico", "Quattrocento", "Quattrocento Sans", "Questrial", "Quicksand", "Quintessential", "Qwigley", "Racing Sans One", "Radley", "Rajdhani", "Rakkas", "Raleway", "Raleway Dots", "Ramabhadra", "Ramaraja", "Rambla", "Rammetto One", "Ranchers", "Rancho", "Ranga", "Rasa", "Rationale", "Ravi Prakash", "Recursive", "Red Hat Display", "Red Hat Text", "Red Rose", "Redressed", "Reem Kufi", "Reenie Beanie", "Revalia", "Rhodium Libre", "Ribeye", "Ribeye Marrow", "Righteous", "Risque", "Roboto", "Roboto Condensed", "Roboto Mono", "Roboto Slab", "Rochester", "Rock Salt", "Rokkitt", "Romanesco", "Ropa Sans", "Rosario", "Rosarivo", "Rouge Script", "Rowdies", "Rozha One", "Rubik", "Rubik Mono One", "Ruda", "Rufina", "Ruge Boogie", "Ruluko", "Rum Raisin", "Ruslan Display", "Russo One", "Ruthie", "Rye", "Sacramento", "Sahitya", "Sail", "Saira", "Saira Condensed", "Saira Extra Condensed", "Saira Semi Condensed", "Saira Stencil One", "Salsa", "Sanchez", "Sancreek", "Sansita", "Sansita Swashed", "Sarabun", "Sarala", "Sarina", "Sarpanch", "Satisfy", "Sawarabi Gothic", "Sawarabi Mincho", "Scada", "Scheherazade", "Schoolbell", "Scope One", "Seaweed Script", "Secular One", "Sedgwick Ave", "Sedgwick Ave Display", "Sen", "Sevillana", "Seymour One", "Shadows Into Light", "Shadows Into Light Two", "Shanti", "Share", "Share Tech", "Share Tech Mono", "Shojumaru", "Short Stack", "Shrikhand", "Siemreap", "Sigmar One", "Signika", "Signika Negative", "Simonetta", "Single Day", "Sintony", "Sirin Stencil", "Six Caps", "Skranji", "Slabo 13px", "Slabo 27px", "Slackey", "Smokum", "Smythe", "Sniglet", "Snippet", "Snowburst One", "Sofadi One", "Sofia", "Solway", "Song Myung", "Sonsie One", "Sora", "Sorts Mill Goudy", "Source Code Pro", "Source Sans Pro", "Source Serif Pro", "Space Grotesk", "Space Mono", "Spartan", "Special Elite", "Spectral", "Spectral SC", "Spicy Rice", "Spinnaker", "Spirax", "Squada One", "Sree Krushnadevaraya", "Sriracha", "Srisakdi", "Staatliches", "Stalemate", "Stalinist One", "Stardos Stencil", "Stint Ultra Condensed", "Stint Ultra Expanded", "Stoke", "Strait", "Stylish", "Sue Ellen Francisco", "Suez One", "Sulphur Point", "Sumana", "Sunflower", "Sunshiney", "Supermercado One", "Sura", "Suranna", "Suravaram", "Suwannaphum", "Swanky and Moo Moo", "Syncopate", "Syne", "Syne Mono", "Syne Tactile", "Tajawal", "Tangerine", "Taprom", "Tauri", "Taviraj", "Teko", "Telex", "Tenali Ramakrishna", "Tenor Sans", "Text Me One", "Texturina", "Thasadith", "The Girl Next Door", "Tienne", "Tillana", "Timmana", "Tinos", "Titan One", "Titillium Web", "Tomorrow", "Trade Winds", "Trirong", "Trispace", "Trocchi", "Trochut", "Trykker", "Tulpen One", "Turret Road", "Ubuntu", "Ubuntu Condensed", "Ubuntu Mono", "Ultra", "Uncial Antiqua", "Underdog", "Unica One", "UnifrakturCook", "UnifrakturMaguntia", "Unkempt", "Unlock", "Unna", "Vampiro One", "Varela", "Varela Round", "Varta", "Vast Shadow", "Vesper Libre", "Viaoda Libre", "Vibes", "Vibur", "Vidaloka", "Viga", "Voces", "Volkhov", "Vollkorn", "Vollkorn SC", "Voltaire", "VT323", "Waiting for the Sunrise", "Wallpoet", "Walter Turncoat", "Warnes", "Wellfleet", "Wendy One", "Wire One", "Work Sans", "Xanh Mono", "Yanone Kaffeesatz", "Yantramanav", "Yatra One", "Yellowtail", "Yeon Sung", "Yeseva One", "Yesteryear", "Yrsa", "Yusei Magic", "ZCOOL KuaiLe", "ZCOOL QingKe HuangYou", "ZCOOL XiaoWei", "Zeyada", "Zhi Mang Xing", "Zilla Slab", "Zilla Slab Highlight"];
																			var rureraform_localfonts = ["Arial", "Bookman", "Century Gothic", "Comic Sans MS", "Courier", "Garamond", "Georgia", "Helvetica", "Lucida Grande", "Palatino", "Tahoma", "Times", "Trebuchet MS", "Verdana"];
																			var rureraform_customfonts = [];
																			@php
																			echo
																			'var rureraform_toolbar_tools = '.json_encode($toolbar_tools);
																			@endphp;
																			@php
																			echo
																			'var rureraform_meta = '.json_encode($element_properties_meta);
																			@endphp;
																			var rureraform_validators = [];
																			var rureraform_filters = [];
																			var rureraform_confirmations = [];
																			var rureraform_notifications = [];
																			var rureraform_integrations = [];
																			var rureraform_payment_gateway = [];
																			var rureraform_math_expressions_meta = [];
																			var rureraform_logic_rules = [];
																			var rureraform_predefined_options = [];
																			@php
																			echo
																			'var rureraform_form_options = '.$tabs_options;
																			@endphp;
																			var rureraform_form_pages_raw = [{
																				"general": "general",
																				"name": "Page",
																				"id": 1,
																				"type": "page"
																			}];
																			//var rureraform_form_elements_raw = []; //Default Value for Questions
																			@php
																			$layout_elements = isset( $layout_elements )? $layout_elements : array();
																			echo
																			'var rureraform_form_elements_raw = '.json_encode($layout_elements);
																			@endphp;
																			//var rureraform_form_elements_raw = ["{\"type\":\"image_quiz\",\"resize\":\"both\",\"height\":\"auto\",\"_parent\":\"1\",\"_parent-col\":\"0\",\"_seq\":0,\"id\":2,\"basic\":\"basic\",\"content\":\"    test     \",\"elements_data\":\"W3siMjM3OCI6eyJmaWVsZF90eXBlIjoiaW1hZ2UiLCJpbWFnZSI6Ii9zdG9yZS8xL2Rhc2hib2FyZC5wbmcifSwiNDAwNjEiOnsiZmllbGRfdHlwZSI6ImltYWdlIiwiaW1hZ2UiOiIvc3RvcmUvMS9kYXNoYm9hcmQucG5nIn19XQ==\"}"];
																			//var rureraform_form_elements_raw = ["{\"basic\":\"basic\",\"content\":\&lt;span class=&quot;block-holder&quot;&gt;&lt;img data-field_type=&quot;image&quot; data-id=&quot;2378&quot; id=&quot;field-2378&quot; class=&quot;editor-field&quot; src=&quot;\/store\/1\/dashboard.png&quot; heigh=&quot;50&quot; width=&quot;50&quot; data-image=&quot;\/store\/1\/dashboard.png&quot;&gt;&lt;\/span&gt;&amp;nbsp; &amp;nbsp; test&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;span class=&quot;block-holder&quot;&gt;&lt;img data-field_type=&quot;image&quot; data-id=&quot;40061&quot; id=&quot;field-40061&quot; class=&quot;editor-field&quot; src=&quot;\/store\/1\/default_images\/admin_dashboard.jpg&quot; heigh=&quot;50&quot; width=&quot;50&quot; data-image=&quot;\/store\/1\/default_images\/admin_dashboard.jpg&quot;&gt;&lt;\/span&gt;&amp;nbsp;&lt;br&gt;",\"elements_data\":{\"2378\":{\"data-field_type\":\"image\",\"data-id\":\"2378\",\"id\":\"field-2378\",\"class\":\"editor-field\",\"src\":\"\/store\/1\/dashboard.png\",\"heigh\":\"50\",\"width\":\"50\",\"data-image\":\"\/store\/1\/dashboard.png\"},\"40061\":{\"data-field_type\":\"image\",\"data-id\":\"40061\",\"id\":\"field-40061\",\"class\":\"editor-field\",\"src\":\"\/store\/1\/default_images\/admin_dashboard.jpg\",\"heigh\":\"50\",\"width\":\"50\",\"data-image\":\"\/store\/1\/default_images\/admin_dashboard.jpg\"}},\"type\":\"image_quiz\",\"resize\":\"both\",\"height\":\"auto\",\"_parent\":\"1\",\"_parent-col\":\"0\",\"_seq\":0,\"id\":2}"];
																			var rureraform_integration_providers = [];
																			var rureraform_payment_providers = [];
																			var rureraform_styles = [{
																				"id": "native-35",
																				"name": "Beige Beige",
																				"type": 1
																			}, {
																				"id": "native-31",
																				"name": "Black and White",
																				"type": 1
																			}, {
																				"id": "native-30",
																				"name": "Blue Lagoon",
																				"type": 1
																			}, {
																				"id": "native-45",
																				"name": "Chamomile Tea",
																				"type": 1
																			}, {
																				"id": "native-32",
																				"name": "Classic Green",
																				"type": 1
																			}, {
																				"id": "native-34",
																				"name": "Dark Night",
																				"type": 1
																			}, {
																				"id": "native-29",
																				"name": "Deep Space",
																				"type": 1
																			}, {
																				"id": "native-27",
																				"name": "Default Style",
																				"type": 1
																			}, {
																				"id": "native-42",
																				"name": "Greenery",
																				"type": 1
																			}, {
																				"id": "native-43",
																				"name": "Honey Bee",
																				"type": 1
																			}, {
																				"id": "native-44",
																				"name": "Honeysuckle",
																				"type": 1
																			}, {
																				"id": "native-47",
																				"name": "Lava Rocks",
																				"type": 1
																			}, {
																				"id": "native-33",
																				"name": "Light Blue",
																				"type": 1
																			}, {
																				"id": "native-40",
																				"name": "Living Coral",
																				"type": 1
																			}, {
																				"id": "native-36",
																				"name": "Mariana Trench",
																				"type": 1
																			}, {
																				"id": "native-37",
																				"name": "Peach Button",
																				"type": 1
																			}, {
																				"id": "native-46",
																				"name": "Something Blue",
																				"type": 1
																			}, {
																				"id": "native-41",
																				"name": "Ultra Violet",
																				"type": 1
																			}];
																			jQuery(document).ready(function () {
																				rureraform_form_ready();
																			});
																			console.log(rureraform_form_elements_raw);
																		</script>
																	</div>
																</div>
															</div>

														</div>
													</div>
												</div>
												
												<div class="col-lg-12 col-md-12 col-12">
													<div class="question-explain-block question-explain-block">
												
														<h3 class="font-20 font-weight-bold">Explanation</h3>
														<textarea class="note-codable summernote" id="question_solve"
																  name="question_solve"
																  aria-multiline="true">{{ isset( $questionObj->question_solve )? $questionObj->question_solve : '' }}</textarea>
						
													<div class="question-keywords-block">
														<!-- Keywords Section -->
														<h3 class="font-20 font-weight-bold">Keywords</h3>
														<div class="keywords-section">
															<div class="keyword-block" data-keyword-index="1">
																	@if(!empty( $keywords ) )
																		@foreach($keywords as $keywordObj)
																			<div class="keyword-item">
																				<span class="editable-content keyword-title-field" data-edit_field="keywords[{{$keywordObj->id}}][title]" contenteditable="true">{{$keywordObj->title}}</span>
																				<input type="text" class="rurera-hide" name="keywords[{{$keywordObj->id}}][title]" value="{{$keywordObj->title}}">
																				<div class="keyword-buttons">
																					<button type="button" class="move-up-keyword" >↑</button>
																					<button type="button" class="move-down-keyword" >↓</button>
																					<button type="button" class="remove-keyword" >✖</button>
																				</div>
																				<textarea cols="100" name="keywords[{{$keywordObj->id}}][description]" rows="5">{{$keywordObj->description}}</textarea>
																			</div>
																		@endforeach
																	@endif
																</div>
																<button type="button" class="add-keyword-btn"><i class="fas fa-plus"></i> Add keyword</button>
														</div>
													</div>
												</div>
												</div>
												<div class="col-12">
													<div class="switches-holder">
														<div class="row">
														<div class="col-lg-4 col-md-4 col-12">
															<div class="form-group custom-switches-stacked">
																<label class="custom-switch pl-0">
																	<input type="hidden" name="review_required_field" value="disable">
																	<input type="checkbox"
																			name="review_required"
																			id="review_required" value="1" {{ (isset( $questionObj->review_required ) && $questionObj->review_required
																		== '1') ?
																		'checked="checked"' : ''
																		}} class="custom-switch-input"/>
																		<span class="custom-switch-indicator"></span>
																		<label class="custom-switch-description mb-0 cursor-pointer" for="review_required"><span>Teacher Review Required</span></label>
																</label>
															</div>
														</div>
														
														<div class="col-lg-4 col-md-4 col-12">
															<div class="form-group custom-switches-stacked">
																<label class="custom-switch pl-0">
																	<input type="hidden" name="developer_review_required_field" value="disable">
																	<input type="checkbox"
																			name="developer_review_required"
																			id="developer_review_required" value="1" {{ (isset( $questionObj->developer_review_required ) && $questionObj->developer_review_required
																		== '1') ?
																		'checked="checked"' : ''
																		}} class="custom-switch-input"/>
																		<span class="custom-switch-indicator"></span>
																		<label class="custom-switch-description mb-0 cursor-pointer" for="developer_review_required"><span>Developer Review Required</span></label>
																</label>
															</div>
														</div>
														
														<div class="col-lg-4 col-md-4 col-12">
															<div class="form-group custom-switches-stacked">
																<label class="custom-switch pl-0">
																	<input type="hidden" name="hide_question_field" value="disable">
																	<input type="checkbox"
																			name="hide_question"
																			id="hide_question" value="1" {{ (isset( $questionObj->hide_question ) && $questionObj->hide_question
																		== '1') ?
																		'checked="checked"' : ''
																		}} class="custom-switch-input"/>
																		<span class="custom-switch-indicator"></span>
																		<label class="custom-switch-description mb-0 cursor-pointer" for="hide_question"><span>Hide Question</span></label>
																</label>
															</div>
														</div>
														</div>
													</div>
												</div>
												
												<div class="col-12 col-md-12">
													<div class="create-question-fields-block d-flex align-items-center mb-30">
														<button type="button" data-status="Submit for review" class="quiz-stage-builder-generate btn btn-primary font-16">
														@if($questionObj->status == 'api_pending')
															Approve
														@else
															Update
														@endif
														</button>
														
														 <button type="button" data-status="" data-question_id="{{isset( $questionObj->id )? $questionObj->id : 0 }}" class="reject-api-question btn btn-danger font-16">
															Delete Bulk
														</button>
														<button type="button" data-status="" data-question_id="{{isset( $questionObj->id )? $questionObj->id : 0 }}" class="reject-api-question-single btn btn-danger font-16">
															Delete Single
														</button>
														<button type="button" data-status="" data-question_id="{{isset( $questionObj->id )? $questionObj->id : 0 }}" class="reject-entire-batch btn btn-danger font-16">
															Delete Batch
														</button>
													</div>
												</div>
												</div>
												</div>
												
												<div class="lms-element-properties">
													<div class="row">
														<div class="topic-parts-block" style="display:contents;">
																
														</div>
													</div>
													<div class="rureraform-admin-popup" id="rureraform-element-properties">
														<div class="rureraform-admin-popup-inner">
															<div class="rureraform-admin-popup-title">
																<a href="#" title="Close"
																   onclick="return rureraform_properties_close();"><i
																			class="fas fa-times"></i></a>
																<h3><i class="fas fa-cog element-properties-label"></i> Element Properties</h3>
															</div>
															<div class="rureraform-admin-popup-content">
																<div class="rureraform-admin-popup-content-form">
																</div>
															</div>
															<div class="rureraform-admin-popup-buttons">
																<a class="rureraform-admin-button duplicate-element btn btn-primary"
																   href="#"><label>Duplicate</label></a>
																<a class="rureraform-admin-button remove-element btn btn-danger" href="#"><label>Remove</label></a>
																<a class="rureraform-admin-button generate-question-code rurera-hide"
																   href="#"><label>Apply Changes</label></a>
															</div>
															<div class="rureraform-admin-popup-loading"><i class="fas fa-spinner fa-spin"></i></div>
														</div>
													</div>
												</div>
												
												</div>
												
												<div class="tab-pane fade py-0 similarity-tab-data" id="Similarity" role="tabpanel" aria-labelledby="Similarity-tab">
														<h3>Topic Parts</h3>
														<div class="topic-parts-block">
															
														@if(isset( $questionObj->topicPartItem->id))
															<div class="topic-parts-options">
																<div class="form-field rureraform-cr-container-medium"> 
																<input class="rureraform-checkbox-medium" type="checkbox" name="topic_part_item_id" id="topics_parts-875" value="875">
																<label for="topics_parts-875"><h5 class="font-16 font-weight-bold text-dark">{{$questionObj->topicPartItem->title}}</h5> 
																	{{$questionObj->topicPartItem->description}}
																.</label>
																</div>
															</div>
														@endif
														</div>
														
														<h3>Similiarity Content</h3>
                                                        <div id="accordion">
                                                            <div class="similarity-content-block-data">
															
															@php
															
															$similiarity_responses	=	rurera_decode($similiarity_responses);
															$similiarity_responses = json_decode($similiarity_responses, true);
															$similiarity_response = isset( $similiarity_responses[$question_index] )? $similiarity_responses[$question_index] : array();
															@endphp
															@if(!empty($similiarity_response))
																@foreach($similiarity_response as $similiarity_html)
																	{!! $similiarity_html !!}
																@endforeach
															@endif
															
															</div>
                                                        </div>
														
														<h3>Activity Wall</h3>
														<div class="lms-dashboard-card">
                                                            <div class="lms-card-body">
                                                                <ul class="lms-card-timeline">
                                                                    <li class="lms-card-list active">
                                                                        <div class="lms-card-icons">
                                                                            <img src="/assets/default/svgs/calendar.svg" alt="calendar icon" height="65" width="65">
                                                                        </div>
                                                                        <div class="lms-card-info">
                                                                        <h5>Reviewer Demo @ <span class="activity-date">18 Nov 24 | 13:08</span></h5>
                                                                        <p>Status Updated : <span class="activity-status">Improvement required</span></p>
                                                                        <p>Please improve&nbsp;</p>
                                                                        </div>
                                                                    </li>
                                                                    <li class="lms-card-list active">
                                                                        <div class="lms-card-icons">
                                                                            <img src="/assets/default/svgs/calendar.svg" alt="calendar icon" height="65" width="65">
                                                                        </div>
                                                                        <div class="lms-card-info">
                                                                            <h5>Javy @<span class="activity-date">18 Nov 24 | 13:02</span></h5>
                                                                            <p>Updated = Submit for review</p>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                
                                                                <div class="text-center mt-4">
                                                                    <a class="lms-card-btn" href="#">View More <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                        <polyline points="12 5 19 12 12 19"></polyline>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
														
														
                                                    </div>
                                                    
                                                    <div class="tab-pane fade py-0" id="review" role="tabpanel" aria-labelledby="review-tab">
                                                        <div class="review-form">
                                                            <form>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <select class="form-control">
                                                                                <option value="Accepted">Accepted</option>
                                                                                <option value="Rejected">Rejected</option>
                                                                                <option value="Deleted">Deleted</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label class="custom-switch pl-0">
                                                                                <input type="checkbox" name="image-question" id="image-question" value="1" class="custom-switch-input">
                                                                                <span class="custom-switch-indicator"></span>
                                                                                <label class="custom-switch-description mb-0 cursor-pointer" for="image-question"><span>Image Question</span></label>
                                                                            </label>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="custom-switch pl-0">
                                                                                <input type="checkbox" name="word-problem" id="word-problem" value="1" class="custom-switch-input">
                                                                                <span class="custom-switch-indicator"></span>
                                                                                <label class="custom-switch-description mb-0 cursor-pointer" for="word-problem"><span>Word Problem</span></label>
                                                                            </label>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="custom-switch pl-0">
                                                                                <input type="checkbox" name="new-glossary" id="new-glossary" value="1" class="custom-switch-input">
                                                                                <span class="custom-switch-indicator"></span>
                                                                                <label class="custom-switch-description mb-0 cursor-pointer" for="new-glossary"><span>New Glossary</span></label>
                                                                            </label>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="custom-switch pl-0">
                                                                                <input type="checkbox" name="glossary-with-illustration" id="glossary-with-illustration" value="1" class="custom-switch-input">
                                                                                <span class="custom-switch-indicator"></span>
                                                                                <label class="custom-switch-description mb-0 cursor-pointer" for="glossary-with-illustration"><span>Glossary With Illustration</span></label>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label class="custom-switch pl-0">
                                                                                <input type="checkbox" name="publish" id="publish" value="1" class="custom-switch-input">
                                                                                <span class="custom-switch-indicator"></span>
                                                                                <label class="custom-switch-description mb-0 cursor-pointer" for="publish"><span>Publish</span></label>
                                                                            </label>
                                                                        </div> 
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label>Details</label>
                                                                            <textarea class="form-control w-100" rows="4"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <button type="submit" class="form-submit-btn">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
												</div>
											</div>
										</div>
									</div>
                                </div>
							</div>
							@include('admin.questions_bank.question_editor_fields_controls')

    			</div>
    		</div>
    	</div>
</section>


<div id="template_display_modal" class="template_display_modal modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content edit-quest-modal-div">
            <div class="modal-body">
			  <div class="modal-box">
				<h3 class="font-24 font-weight-normal mb-10">Activate Template</h3>
				@php $saved_templates = $user->saved_templates;
					$saved_templates = json_decode( $saved_templates );
					$saved_templates = isset( $saved_templates->question_form )? $saved_templates->question_form : array();
				@endphp
				<ul class="apply-template-field">
					@if( !empty( $saved_templates ) )
						@foreach( $saved_templates  as $template_name => $template_data)
							<li data-template_data="{{$template_data}}"> <span>{{$template_name}}</span> <a href="javascript:;" data-template_name="{{$template_name}}" class="remove-template"><i class="fas fa-times"></i></a></li>
						@endforeach
					@endif
					
				</ul>
				
				<div class="inactivity-controls mt-10">
					<a href="javascript:;" class="close" data-dismiss="modal" aria-label="Continue">Close</a>
				</div>
			  </div>
			</div>
        </div>
    </div>
</div>

<div id="template_save_modal" class="template_save_modal modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content edit-quest-modal-div">
            <div class="modal-body">
			  <div class="modal-box">
				<h3 class="font-20 font-weight-bold text-dark mb-10">Save the Form</h3>
				<p class="mb-15 font-16">
					<input type="text" name="template_name" class="template_name form-control">
				</p>
				<input type="hidden" name="form_data_encoded" class="form_data_encoded">
				
				<div class="inactivity-controls">
					<a href="javascript:;" class="continue-btn save-template-btn">Save Form</a>
					<a href="javascript:;" class="close" data-dismiss="modal" aria-label="Continue">Close</a>
				</div>
			  </div>
			</div>
        </div>
    </div>
</div>


<div id="question_status_action_modal" class="modal fade question_status_action_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Question Actions</h3>
            </div>
            <div class="modal-body">
                <form name="question_status_action_form" id="question_status_action_form">
                    <div class="row">

                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <select name="question_status" class="question_status_update custom-select">
                                    <option value="">Action</option>
                                    <option value="Accepted" selected="selected">Accepted</option>
                                    <option value="On hold">On hold</option>
                                    <option value="Improvement required">Improvement required</option>
                                    <option value="Hard reject">Hard reject</option>
                                </select>
                            </div>
                        </div>

                        <div class="question-status-fields" data-status_label="Accepted">
                            <div class="col-12 col-md-12">
                                <div class="form-group custom-switches-stacked mt-2">
                                    <label class="custom-switch pl-0">
                                        <input type="checkbox" name="image_question" id="image_question" value="1"
                                               class="custom-switch-input"/>
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description mb-0 cursor-pointer" for="image_question"><span>Image Question</span></label>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-12">
                                <div class="form-group custom-switches-stacked mt-2">
                                    <label class="custom-switch pl-0">
                                        <input type="checkbox" name="word_problem" id="word_problem" value="1"
                                               class="custom-switch-input"/>
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description mb-0 cursor-pointer" for="word_problem"><span>Word Problem</span></label>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-12">
                                <div class="form-group custom-switches-stacked mt-2">
                                    <label class="custom-switch pl-0">
                                        <input type="checkbox" name="new_glossary" id="new_glossary" value="1"
                                               class="custom-switch-input"/>
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description mb-0 cursor-pointer" for="new_glossary"><span>New Glossary</span></label>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-12 glossary_illustration_field hide">
                                <div class="form-group custom-switches-stacked mt-2">
                                    <label class="custom-switch pl-0">
                                        <input type="checkbox" name="glossary_with_illustration"
                                               id="glossary_with_illustration" value="1" class="custom-switch-input"/>
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description mb-0 cursor-pointer" for="glossary_with_illustration"><span>Glossary with Illustration</span></label>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-12">

                                <label class="input-label">Solution</label>
                                <input type="radio" class="btn-check" name="solution" id="Acceptable" value="Acceptable" autocomplete="off" checked="checked">
                                <label class="btn btn-secondary" for="Acceptable">Acceptable</label>

                                <input type="radio" class="btn-check" name="solution" id="Appropriate" value="Appropriate" autocomplete="off">
                                <label class="btn btn-secondary" for="Appropriate">Appropriate</label>

                                <input type="radio" class="btn-check" name="solution" id="Aspirational" value="Aspirational" autocomplete="off">
                                <label class="btn btn-secondary" for="Aspirational">Aspirational</label>
                            </div>

                            <div class="col-12 col-md-12">
                                <label class="input-label">Difficulty Level</label>
                                <input type="radio" class="btn-check" name="difficulty_level" id="Standard" value="Standard" autocomplete="off" checked="checked">
                                <label class="btn btn-secondary" for="Standard">Standard</label>

                                <input type="radio" class="btn-check" name="difficulty_level" id="Medium" value="Medium" autocomplete="off">
                                <label class="btn btn-secondary" for="Medium">Medium</label>

                                <input type="radio" class="btn-check" name="difficulty_level" id="Expert" value="Expert" autocomplete="off">
                                <label class="btn btn-secondary" for="Expert">Expert</label>
                            </div>

                            <div class="col-12 col-md-12">
                                <div class="form-group custom-switches-stacked mt-2">
                                    <label class="custom-switch pl-0">
                                        <input type="checkbox" name="publish_question" id="publish_question" value="1"
                                               class="custom-switch-input"/>
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description mb-0 cursor-pointer" for="publish_question"><span>Publish</span></label>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label class="input-label">Details</label>
                                <textarea class="note-codable summernote" id="status_details" name="status_details" aria-multiline="true"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="question_id" value="{{isset( $questionObj->id ) ? $questionObj->id : 0}}">
                </form>
            </div>
            <div class="modal-footer">
                <div class="text-right">
                    <a href="javascript:;" class="btn btn-primary question_status_submit_btn">Submit</a>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
<script src="/assets/vendors/summernote/summernote-table-headers.js"></script>
<script>
$(".summernote").summernote({
			dialogsInBody: true,
			tabsize: 2,
			height: $(".summernote").attr('data-height') ?? 250,
			fontNames: [],
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'underline']],
				['para', ['paragraph', 'ul', 'ol']],
				['table', ['table']],
				['insert', ['link']],
				['history', ['undo']],
			],
			callbacks: {
				onPaste: function (e) {
					e.preventDefault();

					var clipboardData = (e.originalEvent || e).clipboardData || window.clipboardData;
					var pastedData = clipboardData.getData('text/html') || clipboardData.getData('text/plain');

					// Create a temporary DOM element to parse the HTML
					var tempDiv = document.createElement('div');
					tempDiv.innerHTML = pastedData;

					// Remove all tags except p, li, ol, ul, strong, u, headings, and table tags
					function cleanTags(node) {
						var allowedTags = ['P', 'LI', 'OL', 'UL', 'STRONG', 'U', 'H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'TABLE', 'TR', 'TD', 'TH'];
						var childNodes = Array.from(node.childNodes);
						childNodes.forEach(function(child) {
							if (child.nodeType === 1) { // Element Node
								if (!allowedTags.includes(child.nodeName)) {
									// Replace disallowed tags with their inner content
									while (child.firstChild) {
										node.insertBefore(child.firstChild, child);
									}
									node.removeChild(child);
								} else {
									// Allowed tag: Clean recursively
									cleanTags(child);

									// Remove all attributes from tables and their children
									if (['TABLE', 'TR', 'TD', 'TH'].includes(child.nodeName)) {
										while (child.attributes.length > 0) {
											child.removeAttribute(child.attributes[0].name);
										}
									}
								}
							} else if (child.nodeType === 3) { // Text Node
								// Do nothing for text nodes
							} else {
								// Remove any other type of node
								node.removeChild(child);
							}
						});
					}

					// Remove all inline styles
					var elementsWithStyles = tempDiv.querySelectorAll('[style]');
					elementsWithStyles.forEach(function (element) {
						element.removeAttribute('style');
					});

					// Remove HTML comments
					function removeComments(node) {
						var childNodes = Array.from(node.childNodes);
						childNodes.forEach(function(child) {
							if (child.nodeType === 8) { // Comment Node
								node.removeChild(child);
							} else if (child.nodeType === 1) {
								removeComments(child);
							}
						});
					}
					removeComments(tempDiv);

					// Clean unwanted tags
					cleanTags(tempDiv);

					// Insert the cleaned content into the editor
					document.execCommand('insertHTML', false, tempDiv.innerHTML);
				}
			}
		});
</script>