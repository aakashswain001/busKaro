<!-- banner start -->
		<!-- ================ -->
		<div id="banner" class="banner" style="background-color: black">
			<div class="banner-image"></div>
			<div class="banner-caption" style="margin-top: 0px">
				<div class="container" id="banner-caption-container" style="margin-top: 0px">
					<div class="row" style="margin-top: 0px">
					<form method="get" action="search_bus.php">
						<div class="col-md-6 col-md-offset-3 object-non-visible" style="margin-top: 0px" data-animation-effect="fadeIn">
							<h2 class="text-center">Search <span>Buses</span></h2>
							<div class="space"></div>
							<div class="lead text-center">
								<div class="row upperinput">
									<div class="col-md-3 col-md-offset-1" style="justify-content: right">
												<select name="frommm" class="inputText" placeholder="Source city"/>
									<?php
									//include( 'db.php' );
									$result = mysql_query( "SELECT id,name FROM city" );
									while ( $row = mysql_fetch_array( $result ) ) {
										echo '<option value="' . $row[ 'id' ] . '">';
										echo $row[ 'name' ];
										echo '</option>';
									}
									?>
									</select>

									</div>
									<div class="col-md-3 col-md-offset-2" style="justify-content: left">
										<select class="selectText" id="sourceSelect">
											<option value="1">Source State</option>
											<option value="odisha">Odisha</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3 col-md-offset-1" style="justify-content: right">
											<select name="tooo" class="inputText" placeholder="Source city"/>
									<?php
									//include( 'db.php' );
									$result = mysql_query( "SELECT id,name FROM city" );
									while ( $row = mysql_fetch_array( $result ) ) {
										echo '<option value="' . $row[ 'id' ] . '">';
										echo $row[ 'name' ];
										echo '</option>';
									}
									?>
									</select>
</div>
									<div class="col-md-3 col-md-offset-2" style="justify-content: left">
										<select class="selectText" id="destinationSelect">
											<option value="1">Destination State</option>
											<option value="odisha">Odisha</option>
										</select>
									</div>
								</div>
								<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
								<div class="bootstrap-iso" style="background-color: transparent; z-index: 1000">
									<div class="container-fluid">
										<div class="row">
											<div class="col-md-6 col-md-offset-3 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
												<h2 class="text-center">
													<form class="form-horizontal" method="post">
														<div class="form-group" id="form-group">
															<div class="input-group">
																<div class="input-group-addon">
																	<i class="fa fa-calendar">
																	</i>
																</div>
																<input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text" />
															</div>
														</div>
													</form>
												</h2>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-md-offset-3">
										<h2 class="text-center">
										<?php
											if($_SESSION['user']==""){
											echo	'<input type="button" onClick="myf()"value="search" class="button" style="z-index: 450; margin-bottom: 270px;">';
												echo '<script type="text/javascript">
												function myf(){
												alert("Login to continue ");}</script>';
							
											}else{
											echo	'<input type="submit" value="search" class="button" style="z-index: 450; margin-bottom: 270px;">';
											}
											?>
										</h2>
									</div>
								</div>
							</div>
					</form>	</div>
					</div>
				</div>
			</div>
		</div>
		<!-- banner end -->
