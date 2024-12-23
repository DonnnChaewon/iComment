<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "icomment";

$connection = mysqli_connect($host, $user, $pass, $db);

if (!$connection) {
    echo "Cannot connect to database";
}

$commentId = "";
$commentContent = "";
$parentId = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="mx-auto">
        <div class="card"><span class="border border-white">
                <div class="card-header bg-secondary text-light">
                    Comments & Replies
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="color: white">Comment ID</th>
                                <th scope="col" style="color: white">Comment Content</th>
                                <th scope="col" style="color: white">Parent ID</th>
                            </tr>
                        <tbody>
                            <?php
                            $sql2 = "SELECT * FROM comments ORDER BY commentId ASC";
                            $q2 = mysqli_query($connection, $sql2);

                            while ($r2 = mysqli_fetch_array($q2)) {
                                $commentId = $r2['commentId'];
                                $commentContent = $r2['commentContent'];
                                $parentId = $r2['parentId'];
                                ?>
                                <tr>
                                    <td scope="row" style="color: white"><?php echo $commentId ?></td>
                                    <td scope="row" style="color: white"><?php echo $commentContent ?></td>
                                    <td scope="row" style="color: white"><?php echo $parentId ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        </thead>
                    </table>
                    <p>Komentar yang mempunyai parent ID dianggap sebagai balasan (reply).</p>
                </div>
            </span>
        </div>
    </div>

    <div class="mx-auto">
        <div class="card">
            <?php
            $sql = "SELECT COUNT(commentId) AS 'Total komentar' FROM comments";
            $result = mysqli_query($connection, $sql);

            // Fetch the result and display the total number of comments
            if ($row = mysqli_fetch_assoc($result)) {
                echo 'Total komentar: ' . $row['Total komentar'];
            } else {
                echo 'Total comments: 0';
            }
            ?>
        </div>
    </div>
</body>

</html>