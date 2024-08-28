<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Popup styling */
        .popup {
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            display: none; /* Hidden by default */
        }

        .popup-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888888;
            width: 30%;
            font-weight: bolder;
        }

        .popup-content button {
            display: block;
            margin: 0 auto;
        }

        table.table {
            font-size: 30px;
            width: 700px;
        }

        table.table th, table.table td {
            padding: 10px;
            width: 700px;
            text-align: center;
        }

        table.table th {
            white-space: nowrap;
        }

        .popup-content input,
        .popup-content textarea,
        .popup-content select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <?php include 'header.html'; ?>
    <?php include 'nav.html'; ?>
    <?php include 'php_backend/reviews_backend.php'; ?>

    <div id="myPopup" class="popup">
        <div class="popup-content">
            <h1 style="color: green">Edit Review</h1>
            <p><strong>ID:</strong> <span id="reviewId"></span></p>
            <label for="editUserName">User:</label>
            <input type="text" id="editUserName" />

            <label for="editProductName">Product:</label>
            <input type="text" id="editProductName" />

            <label for="editUserRating">Rating (1-5):</label>
            <input type="number" id="editUserRating" min="1" max="5" />

            <label for="editUserComment">Comments:</label>
            <textarea id="editUserComment"></textarea>

            <button id="updateReview">Update</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Reviews</p>
                    <div>
                        <table class="table table-striped table-bordered" id="userTable">
                            <thead>
                                <tr>
                                    <th>Review id</th>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Rating</th>
                                    <th>Comments</th>
                                    <th>Created At</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr data-review-id="<?php echo $row['review_id']; ?>">
                                        <td><?php echo $row["review_id"]; ?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row["pname"]; ?></td>
                                        <td>
                                            <?php $rating = $row["rating"];
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $rating) {
                                                    echo '<i class="fas fa-star" style="color:#4B49AC;"></i>';
                                                }
                                            } ?>
                                        </td>
                                        <td><?php echo $row["comment"]; ?></td>
                                        <td><?php echo $row["created_at"]; ?></td>
                                        <td>
                                            <button onclick="confirmUpdate(<?php echo $row['review_id']; ?>)" type="button" class="btn btn-success" style="color: white !important;">Update</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    <script>
        function confirmUpdate(reviewId) {
            var reviewRow = document.querySelector("tr[data-review-id='" + reviewId + "']");
            var userName = reviewRow.querySelector("td:nth-child(2)").textContent;
            var productName = reviewRow.querySelector("td:nth-child(3)").textContent;
            var userRating = reviewRow.querySelector("td:nth-child(4)").innerHTML;
            var userComment = reviewRow.querySelector("td:nth-child(5)").textContent;
            document.getElementById("reviewId").textContent = reviewId;
            document.getElementById("editUserName").value = userName;
            document.getElementById("editProductName").value = productName;
            document.getElementById("editUserComment").value = userComment;  
            selectedRating = (userRating.match(/fa-star/g) || []).length;
            document.getElementById("editUserRating").value = selectedRating;
            document.getElementById("myPopup").style.display = "block";
        }

        document.getElementById("updateReview").addEventListener("click", function () {
            var reviewId = document.getElementById("reviewId").textContent;
            var updatedUserName = document.getElementById("editUserName").value;
            var updatedProductName = document.getElementById("editProductName").value;
            var updatedRating = document.getElementById("editUserRating").value;
            var updatedComment = document.getElementById("editUserComment").value;

            $.ajax({
                url: 'php_backend/update_review.php', 
                type: 'POST',
                data: {
                    review_id: reviewId,
                    user_name: updatedUserName,
                    product_name: updatedProductName,
                    rating: updatedRating,
                    comment: updatedComment
                },
                success: function(response)
                 {
                    console.log(response);
                    if(response === 'success') {
                        alert('Review updated successfully!');
                        location.reload();
                    } 
                },
            });

            document.getElementById("myPopup").style.display = "none";
        });

        document.getElementById("closePopup").addEventListener("click", function () {
            document.getElementById("myPopup").style.display = "none";
        });

        window.addEventListener("click", function (event) {
            if (event.target == document.getElementById("myPopup")) {
                document.getElementById("myPopup").style.display = "none";
            }
        });

        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
</body>
</html>
