<?php
    session_start();
    include "dbConnection.php";
    
    $conn = getDatabaseConnection('final_project');
    
    if(!isset($_SESSION["adminName"])) {
        header("Location:login.php");
    }
  
    function displayAllCategories() {
      
      global $conn;
      
      $sql = "SELECT * FROM category ORDER BY catId";
      $stmt = $conn->prepare($sql);
      $stmt -> execute();
      $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      return $records;
    }
    
    function displayAllDirectors() {
      global $conn;
      
      $sql = "SELECT * FROM director ORDER BY directorId";
      $stmt = $conn->prepare($sql);
      $stmt -> execute();
      $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      return $records;
    }
    
    function displayAllMovies() {
      global $conn;
      
      $sql = "SELECT * FROM movie ORDER BY movieId";
      $stmt = $conn->prepare($sql);
      $stmt -> execute();
      $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      return $records;
    }
  
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script>
    
        
          $(document).ready(function(){
            $('#categorySubmit').click(function(){
              var categoryName = $('#categoryName').val();
              var categoryDescription = $('#categoryDescription').val();

              $.post('./category.php', { submitCategory: '1', categoryName, categoryDescription }, function (err, res) {
                $('#categoryModal').modal('hide');
                location.reload();
              }); 
            });
            
            $('.delete-category-button').click(function(e){
              e.preventDefault();
              
              var value = $(this).val();
              
              $.post('./category.php', { deleteCategory: '1', categoryId: value }, function () {
                location.reload();
              });
            });
            
            $('.update-category-button').click(function(e){
              e.preventDefault();
              
              var value = $(this).val();
              
              $.post('./category.php', { getCategoryData: '1', categoryId: value }, function (res) {
                
                var data = JSON.parse(res);
                
                $('#editCategoryName').val(data[0].catName);
                $('#editCategoryDescription').val(data[0].catDescription);
                $('#editCategorySubmit').val(data[0].catId);
                $('#editCategoryModal').modal('show');

                
              });
            });
            
            $('#editCategorySubmit').click(function(){
              var categoryName = $('#editCategoryName').val();
              var categoryDescription = $('#editCategoryDescription').val();
              var categoryId = $('#editCategorySubmit').val();

              $.post('./category.php', { editCategory: '1', categoryName, categoryDescription, categoryId }, function (res) {
                $('#editCategoryModal').modal('hide');
                location.reload();
              }); 
            });
            
            $('#directorSubmit').click(function(){
              var directorName = $('#directorName').val();
              $.post('./director.php', { createDirector: '1', directorName }, function (res) {
                $('#directorModal').modal('hide');
                location.reload();
              }); 
            });
            
            $('.delete-director-button').click(function(e){
              e.preventDefault();
              
              var value = $(this).val();
              
              $.post('./director.php', { deleteDirector: '1', directorId: value }, function () {
                location.reload();
              });
            });
            
            $('.update-director-button').click(function(e){
              e.preventDefault();
              
              var value = $(this).val();
              
              $.post('./director.php', { getDirectorData: '1', directorId: value }, function (res) {
                
                var data = JSON.parse(res);
                
                $('#editDirectorName').val(data[0].directorName);
                $('#editDirectorSubmit').val(data[0].directorId);
                $('#editDirectorModal').modal('show');

                
              });
            });
            
            $('#editDirectorSubmit').click(function(){
              var directorName = $('#editDirectorName').val();
              var directorId = $('#editDirectorSubmit').val();

              $.post('./director.php', { editDirector: '1', directorName, directorId }, function (res) {
                $('#editDirectorModal').modal('hide');
                location.reload();
              }); 
            });
            
            $('#movieSubmit').click(function(){
              var movieName = $('#movieName').val();
              var movieYear = $('#movieYear').val();
              var movieDescription = $('#movieDescription').val();
              var moviePrice = $('#moviePrice').val();
              var movieImage = $('#movieImage').val();
              var movieBudget = $('#movieBudget').val();
              var movieReview = $('#movieReview').val();
              var movieCategory = $('#movieCategory').val();
              var movieDirector = $('#movieDirector').val();
              
              $.post('./movie.php', { createMovie: '1', movieName, movieYear, movieDescription, moviePrice, movieImage, movieBudget, movieReview, movieCategory, movieDirector }, function (res) {
                $('#movieModal').modal('hide');
                location.reload();
              }); 
            });
            
            $('.delete-movie-button').click(function(e){
              e.preventDefault();
              
              var value = $(this).val();
              
              $.post('./movie.php', { deleteMovie: '1', movieId: value }, function () {
                location.reload();
              });
            });
            
            $('.update-movie-button').click(function(e){
              e.preventDefault();
              
              var value = $(this).val();
              
              $.post('./movie.php', { getMovieData: '1', movieId: value }, function (res) {
                
                var data = JSON.parse(res);
                
                $('#editMovieName').val(data[0].movieName);
                $('#editMovieYear').val(data[0].movieYear);
                $('#editMoviePrice').val(data[0].price);
                $('#editMovieDescription').val(data[0].movieDescription);
                $('#editMovieImage').val(data[0].movieImage);
                $('#editMovieBudget').val(data[0].movieBudget);
                $('#editMovieReview').val(data[0].movieReview);
                $('#editMovieCategoryId').val(data[0].catId);
                $('#editMovieDirectorId').val(data[0].directorId);
                $('#editMovieSubmit').val(data[0].movieId);
                $('#editMovieModal').modal('show');

                
              });
            });
            
            $('#editMovieSubmit').click(function(){
              var movieName = $('#editMovieName').val();
              var movieYear = $('#editMovieYear').val();
              var movieDescription = $('#editMovieDescription').val();
              var moviePrice = $('#editMoviePrice').val();
              var movieImage =$('#editMovieImage').val();
              var movieBudget =$('#editMovieBudget').val();
              var movieReview =$('#editMovieReview').val();
              var movieCategory = $('#editMovieCategoryId').val();
              var movieDirector = $('#editMovieDirectorId').val();
              var movieId = $('#editMovieSubmit').val();
              
              $.post('./movie.php', { editMovie: '1', movieName, movieYear, movieDescription, moviePrice, movieImage, movieCategory, movieDirector, movieId, movieBudget, movieReview }, function (res) {
                $('#editMovieModal').modal('hide');
                location.reload();
              }); 
            });
            
            
          });
          
        </script>
    </head>
    <body>
        <div class="container">
            
            <h1>Admin Main Page</h1>
        <h3> Welcome <?=$_SESSION['adminName']?> </h3>
        <form style='display: inline-block;' action="logout.php">
            <input type ="submit" class='btn btn-danger' id = "beginning" value="Logout"/>
        </form>
        
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Category</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Director</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Movie</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            
             
             <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#categoryModal">
              Add Category
            </button>
            
            <?php
              $records = displayAllCategories();
              echo "<table class='table table-hover'>";
              echo "<thead>
                      <tr>
                          <th scope='col'>ID</th>
                          <th scope='col'>Category</th>
                          <th scope='col'>Description</th>
                          <th scope='col'>Update</th>
                          <th scope='col'>Remove</th>
                      </tr>
                      </thead>";
                      
              echo "<tbody>";
              foreach($records as $record) {
                  
                  echo "<tr>";
                  echo "<td>" . $record['catId'] . "</td>";
                  echo "<td>" . $record['catName'] . "</td>";
                  echo "<td>" . $record['catDescription'] . "</td>";
                  echo "<td><button class='btn btn-primary update-category-button' value=". $record['catId'] .">Update</a></td>";
                  echo "<td><button class= 'btn btn-danger delete-category-button' value=". $record['catId'] .">Delete</button></td>";
              }
              echo "</tbody>";
              echo "</table>";
            ?>
            
            <!-- Create Category Modal -->
            <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form>
                          <div class="form-group">
                            <label for="categoryName">Category Name</label>
                            <input class="form-control" id="categoryName">
                          </div>
                          <div class="form-group">
                            <label for="categoryDescription">Category Description</label>
                            <input class="form-control" id="categoryDescription"/>
                          </div>
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="categorySubmit" type="button" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Edit Category Modal -->
            <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form>
                          <div class="form-group">
                            <label for="editCategoryName">Category Name</label>
                            <input class="form-control" id="editCategoryName">
                          </div>
                          <div class="form-group">
                            <label for="editCategoryDescription">Category Description</label>
                            <input class="form-control" id="editCategoryDescription"/>
                          </div>
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="editCategorySubmit" type="button" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
             
             
             
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            
            <!-- Button trigger director modal -->
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#directorModal">
              Add Director
            </button>
            
            <?php
              $records = displayAllDirectors();
              echo "<table class='table table-hover'>";
              echo "<thead>
                      <tr>
                          <th scope='col'>ID</th>
                          <th scope='col'>Director Name</th>
                          <th scope='col'>Update</th>
                          <th scope='col'>Remove</th>
                      </tr>
                      </thead>";
                      
              echo "<tbody>";
              foreach($records as $record) {
                  
                  echo "<tr>";
                  echo "<td>" . $record['directorId'] . "</td>";
                  echo "<td>" . $record['directorName'] . "</td>";
                  echo "<td><button class='btn btn-primary update-director-button' value=". $record['directorId'] .">Update</a></td>";
                  echo "<td><button class= 'btn btn-danger delete-director-button' value=". $record['directorId'] .">Delete</button></td>";
              }
              echo "</tbody>";
              echo "</table>";
            ?>
            
            <!-- Create Director Modal -->
            <div class="modal fade" id="directorModal" tabindex="-1" role="dialog" aria-labelledby="directorModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Director</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form>
                          <div class="form-group">
                            <label for="directorName">Director Name</label>
                            <input class="form-control" id="directorName">
                          </div>
                      
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="directorSubmit" type="button" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Edit Director Modal -->
            <div class="modal fade" id="editDirectorModal" tabindex="-1" role="dialog" aria-labelledby="editDirectorModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Director</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form>
                          <div class="form-group">
                            <label for="editDirectorName">Director Name</label>
                            <input class="form-control" id="editDirectorName">
                          </div>
                      
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="editDirectorSubmit" type="button" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
            
            
              
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              
              <!-- Button trigger director modal -->
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#movieModal">
              Add Movie
            </button>
            
            <?php
              $records = displayAllMovies();
              echo "<table class='table table-hover'>";
              echo "<thead>
                      <tr>
                          <th scope='col'>ID</th>
                          <th scope='col'>Movie Name</th>
                          <th scope='col'>Release Year</th>
                          <th scope='col'>Price</th>
                          <th scope='col'>Description</th>
                          <th scope='col'>Movie Image</th>
                          <th scope='col'>Movie Budget</th>
                          <th scope='col'>Movie Review</th>
                          <th scope='col'>Cat ID</th>
                          <th scope='col'>Director ID</th>
                      </tr>
                      </thead>";
                      
              echo "<tbody>";
              foreach($records as $record) {
                  
                  echo "<tr>";
                  echo "<td>" . $record['movieId'] . "</td>";
                  echo "<td>" . $record['movieName'] . "</td>";
                  echo "<td>" . $record['movieYear'] . "</td>";
                  echo "<td>$" . $record['price'] . "</td>";
                  echo "<td>" . $record['movieDescription'] . "</td>";
                  echo "<td>" . $record['movieImage'] . "</td>";
                  echo "<td>" . $record['movieBudget'] . "</td>";
                  echo "<td>" . $record['movieReview'] . "</td>";
                  echo "<td>" . $record['catId'] . "</td>";
                  echo "<td>" . $record['directorId'] . "</td>";
                  echo "<td><button class='btn btn-primary update-movie-button' value=". $record['movieId'] .">Update</a></td>";
                  echo "<td><button class= 'btn btn-danger delete-movie-button' value=". $record['movieId'] .">Delete</button></td>";
              }
              echo "</tbody>";
              echo "</table>";
            ?>
            
            <!-- Create Movie Modal -->
            <div class="modal fade" id="movieModal" tabindex="-1" role="dialog" aria-labelledby="movieModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Movie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form>
                          <div class="form-group">
                            <label for="movieName">Movie Name</label>
                            <input class="form-control" id="movieName">
                          </div>
                          <div class="form-group">
                            <label for="movieYear">Movie Year</label>
                            <input maxlength="4" class="form-control" id="movieYear">
                          </div>
                          <div class="form-group">
                            <label for="moviePrice">Price</label>
                            <input class="form-control" id="moviePrice">
                          </div>
                          <div class="form-group">
                            <label for="movieDescription">Description</label>
                            <input class="form-control" id="movieDescription">
                          </div>
                          <div class="form-group">
                            <label for="movieImage">Image URL</label>
                            <input class="form-control" id="movieImage">
                          </div>
                          <div class="form-group">
                            <label for="movieBudget">Movie Budget</label>
                            <input class="form-control" id="movieBudget">
                          </div>
                          <div class="form-group">
                            <label for="movieReview">Movie Review</label>
                            <input class="form-control" id="movieReview">
                          </div>
                          <div class="form-group">
                            <label for="movieCategory">Category</label>
                            <select id="movieCategory" class="form-control">
                              <option value=""> Select One </option>

                              <?php
                                $records = displayAllCategories();
                                foreach($records as $record) {
                                  echo "<option value=" . $record['catId']. ">" . $record['catName']. "</option>";
                                }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="movieDirector">Director</label>
                            <select id="movieDirector" class="form-control">
                              <option value=""> Select One </option>
                              <?php
                                $records = displayAllDirectors();
                                foreach($records as $record) {
                                  echo "<option value=" . $record['directorId']. ">" . $record['directorName']. "</option>";
                                }
                                
                              ?>
                            </select>
                          </div>
                      
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="movieSubmit" type="button" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Edit Movie Modal -->
            <div class="modal fade" id="editMovieModal" tabindex="-1" role="dialog" aria-labelledby="editMovieModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Movie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form>
                          <div class="form-group">
                            <label for="editMovieName">Movie Name</label>
                            <input class="form-control" id="editMovieName">
                          </div>
                          <div class="form-group">
                            <label for="editMovieYear">Movie Year</label>
                            <input maxlength="4" class="form-control" id="editMovieYear">
                          </div>
                          <div class="form-group">
                            <label for="editMoviePrice">Price</label>
                            <input class="form-control" id="editMoviePrice">
                          </div>
                          <div class="form-group">
                            <label for="editMovieDescription">Description</label>
                            <input class="form-control" id="editMovieDescription">
                          </div>
                          <div class="form-group">
                            <label for="editMovieImage">Image URL</label>
                            <input class="form-control" id="editMovieImage">
                          </div>
                          <div class="form-group">
                            <label for="editMovieBudget">Movie Budget</label>
                            <input class="form-control" id="editMovieBudget">
                          </div>
                          <div class="form-group">
                            <label for="editMovieReview">Movie Review</label>
                            <input class="form-control" id="editMovieReview">
                          </div>
                          <div class="form-group">
                            <label for="editMovieCategoryId">Category</label>
                            <select id="editMovieCategoryId" class="form-control">
                              <option value=""> Select One </option>

                              <?php
                                $records = displayAllCategories();
                                foreach($records as $record) {
                                  echo "<option value=" . $record['catId']. ">" . $record['catName']. "</option>";
                                }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="editMovieDirectorId">Director</label>
                            <select id="editMovieDirectorId" class="form-control">
                              <option value=""> Select One </option>
                              <?php
                                $records = displayAllDirectors();
                                foreach($records as $record) {
                                  echo "<option value=" . $record['directorId']. ">" . $record['directorName']. "</option>";
                                }
                                
                              ?>
                            </select>
                          </div>
                      
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="editMovieSubmit" type="button" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
              
              
              
              
          </div>
        </div>

        
    
        <br />

            
        </div>
    
        
    </body>
</html>