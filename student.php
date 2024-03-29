<?php
include_once("header.php");
?>

<div class="row">
  <div class="col-12">
    <div class="row">
      <div class="padding-first-row">
        <div class="col-6">
          <div class="search-chart-container">
            <div class="search-chart-box px-5 ">
              <h5 class="titi">Search</h5>
              <div class="input-group">
                <form action="" method="POST">
                  <div class="id-semester-display">

                    <input type="number" name="id" class="form-control searchbox" id="id" style="width: 50%; border-radius: 5px 5px 5px 5px" placeholder="Enter ID">
                    <select name="Semester" class="form-select dropdown-btn-student" aria-label="Default select example">
                      <option selected> Semester</option>
                      <option value="Summer 2023">Summer 2023</option>
                      <option value="Spring 2023">Spring 2023</option>
                      <option value="Fall 2022">Fall 2022</option>
                      <option value="Summer 2022">Summer 2022</option>
                      <option value="Spring 2022">Spring 2022</option>
                    </select>

                  </div>

                  <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit" name="search">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="search-chart-container">
            <div class="search-chart-box">
              <h5 class="titi">Result</h5>
              <?php

              if (isset($_POST['search'])) {
                $id = $_POST['id'];
                $semester = $_POST['Semester'];
                require("config.php");
                $value = mysqli_query($mysqli, "SELECT * FROM result WHERE S_ID='$id'");

              ?>

                <table border="0" class="table mt-5">
                  <thead>
                    <tr>
                      <th scope="col">Course_Title</th>
                      <th scope="col">Quiz</th>
                      <th scope="col">Mid</th>
                      <th scope="col">Final</th>
                      <th scope="col">GPA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($item = $value->fetch_assoc()) {
                      $sum = $item['Quiz'] + $item['Mid'] + $item['Final'];
                      $val;
                      if ($sum > 79)
                        $val = 4.00;
                      else if ($sum > 74)
                        $val = 3.75;
                      else if ($sum > 69)
                        $val = 3.50;
                      else if ($sum > 64)
                        $val = 3.25;
                      else if ($sum > 59)
                        $val = 3.00;
                      else if ($sum > 54)
                        $val = 2.75;
                      else if ($sum > 49)
                        $val = 2.50;
                      else if ($sum > 44)
                        $val = 2.00;
                      else
                        $val = 0.00;
                      $course = $item['Course_Title'];
                    ?>
                      <tr>
                        <td><?php echo $item['Course_Title'] ?></td>
                        <td><?php echo $item['Quiz'] ?></td>
                        <td><?php echo $item['Mid'] ?></td>
                        <td><?php echo $item['Final'] ?></td>
                        <td><?php echo $val ?></td>
                      </tr>


                    <?php }
                    ?>
                  <tbody>
                </table>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- pie chart and gpa  -->
    <div class="row">
      <div class="padding-first-row">
        <div class="col-6">
          <div class="gpa-container">
            <div class="gpa-box">
              <h5 class="titi">Result Analysis</h5>
              <?php include("piechart.php"); ?>
              <div id="piechart" style="width: auto; height: 100%;" class="pt-5 px-5"></div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="gpa-container">
            <div class="gpa-box px-5">
              <h5 class="titi">UGC Grading System</h5>
              <table class="table mt-5">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Marks(%)</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Grade Point</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">80-100</th>
                    <td>A+</td>
                    <td>4.00</td>
                  </tr>
                  <tr>
                    <th scope="row">75-79</th>
                    <td>A</td>
                    <td>3.75</td>
                  </tr>
                  <tr>
                    <th scope="row">70-74</th>
                    <td>A-</td>
                    <td>3.50</td>
                  </tr>
                  <tr>
                    <th scope="row">65-69</th>
                    <td>B+</td>
                    <td>3.25</td>
                  </tr>
                  <tr>
                    <th scope="row">60-64</th>
                    <td>B</td>
                    <td>3.00</td>
                  </tr>
                  <tr>
                    <th scope="row">55-59</th>
                    <td>B-</td>
                    <td>2.75</td>
                  </tr>
                  <tr>
                    <th scope="row">50-54</th>
                    <td>C+</td>
                    <td>2.50</td>
                  </tr>
                  <tr>
                    <th scope="row">45-49</th>
                    <td>C</td>
                    <td>2.25</td>
                  </tr>
                  <tr>
                    <th scope="row">40-44</th>
                    <td>D</td>
                    <td>2.00</td>
                  </tr>
                  <tr>
                    <th scope="row">00-39</th>
                    <td>F</td>
                    <td>0.00</td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- bar chart -->
    <div class="row">
      <div class="col-12">
        <div class="barchart-container">
          <?php include("barchart.php"); ?>
          <div class="barchart-box">
            <h5 class="titi2">Report Generation</h5>
            <div id="top_x_div" style="height: 300px; padding:30px;" class="col-12 mt-5"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Table chart -->
    <div class="row">
      <div class="col-12">
        <div class="barchart-container ">
          <div class="barchart-box p-2">
            <h5 class="titi2">Feedback & Recheck</h5>
            <?php
            $id = $_SESSION['ID'];
            require("config.php");
            $value = mysqli_query($mysqli, "SELECT * FROM result WHERE S_ID='$id'");

            ?>
            <table border="1" class="table mt-5">
              <thead>
                <tr>
                  <th scope="col">Course_Title</th>
                  <th scope="col">GPA</th>
                  <th scope="col">Feedback</th>
                  <th scope="col">Recheck Request</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($item = $value->fetch_assoc()) {
                  $sum = $item['Quiz'] + $item['Mid'] + $item['Final'];
                  $val;
                  if ($sum > 79)
                    $val = 4.00;
                  else if ($sum > 74)
                    $val = 3.75;
                  else if ($sum > 69)
                    $val = 3.50;
                  else if ($sum > 64)
                    $val = 3.25;
                  else if ($sum > 59)
                    $val = 3.00;
                  else if ($sum > 54)
                    $val = 2.75;
                  else if ($sum > 49)
                    $val = 2.50;
                  else if ($sum > 44)
                    $val = 2.00;
                  else
                    $val = 0.00;
                  $course = $item['Course_Title'];
                ?>
                  <tr>
                    <td><?php echo $item['Course_Title'] ?></td>
                    <td><?php echo $val ?></td>
                    <td><?php echo $item['Feedback'] ?></td>
                    <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#checkModal<?php echo $sid ?>">
                        <i class="fa-solid fa-repeat" style="font-size: 20px; margin-top: -5px; color: #212529;"></i>
                      </button></td>
                  </tr>


                  <!-- Modal Recheck-->
                  <div class="modal fade" id="checkModal<?php echo $sid ?>" tabindex="-1" aria-labelledby="checkModal" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="checkModal">Recheck Application for <?php echo $sid ?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="markupdate.php">
                          <div class="modal-body">


                            <input type="hidden" value="<?php echo $sid ?>" name="sid">
                            <input type="hidden" value="<?php echo $course ?>" name="c_id">

                            <div class="mb-3">
                              <label for="subject<?php echo $sid ?>" class="form-label">Subject</label>
                              <input name="subject" id="subject<?php echo $sid ?>" class="form-control">

                            </div>
                            <div class="mb-3">
                              <label for="des<?php echo $sid ?>" class="form-label">Description</label>
                              <textarea name="des" id="des<?php echo $sid ?>" class="form-control" cols="20" rows="5"></textarea>

                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="recheck">Save changes</button>
                          </div>
                        </form>

                      </div>
                    </div>
                  </div>

                <?php }
                ?>
              <tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<?php
include_once("footer.php");
?>