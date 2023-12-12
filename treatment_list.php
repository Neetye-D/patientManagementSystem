<?php
include "config.php";
?>



<div class="container" style="padding:25px;">
                <table class="table table-hover text-center">
                    <thead class="table">
                        <tr>
                            <th colspan="7">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" id="searchInput" class="form-control" placeholder="Search">
                                    </div>
                                    <div class="col-md-6 text-md-end">
                                        <!-- <a href="register_form.php" class="btn btn-dark add-btn" style="border: 2px solid green;" >Add New Patient</a> -->
                                        <a href="#" data-toggle="modal" data-target="#registerModal" class="btn btn-dark add-btn"  style="border: 2px solid green;" >Add New Patient</a>

                                    </div>
                                </div>
                            </th>
                        </tr>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Treatment details</th>
                                <th scope="col">treatment_start_date  </th>
                                <th scope="col">treatment_finish_date </th>
                                <th scope="col">prescriptions</th>
                                <th scope="col">Action</th>
                            </tr>
                    </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $select = "SELECT * FROM treatment ";

                                $stmt = $pdo->query($select);
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <th><?php echo $row['patient_id'] ?></th>
                                    <th><?php echo $row['treatment_details'] ?></th>
                                    <th><?php echo $row['treatment_start_date'] ?></th>
                                    <th><?php echo $row['treatment_finish_date'] ?></th>
                                    <th><?php echo $row['prescriptions'] ?></th>
                                    <td>
                                        <a href="edit.php?patient_id=<?php echo $row['patient_id'] ?>" class="line-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                        <a href="delete.php?patient_id=<?php echo $row['patient_id'] ?>" class="line-dark"><i class="fa-solid fa-trash-can fs-5"></i></a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>     
                            </tbody>
                        </table>
                    </div>
                    </div>