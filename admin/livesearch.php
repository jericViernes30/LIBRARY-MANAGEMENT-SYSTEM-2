<?php

include ("../database/connect.php");

if(isset($_POST['input'])){
    $input = $_POST['input'];

    $query = "SELECT * FROM books_data WHERE title LIKE '{$input}%' OR isbn LIKE '{$input}%' or author LIKE '{$input}%'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result)>0) {?>
        <ul>
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <form method="POST" action="test.php">
                    <button>
                        <li>
                            <?php echo '<img src="../img/'.$row['cover'].'">'?>
                            <p style="font-weight: bold;">Title: <span style="font-weight: 100;"><?php echo $row['title']?></span></p>
                            <p style="font-weight: bold;">Author: <span style="font-weight: 100;"><?php echo $row['author']?></span></p>
                            <p style="font-weight: bold;">ISBN: <span style="font-weight: 100;"><?php echo $row['isbn']?></span></p>
                            <input type="hidden" name="isbn" value="<?php echo $row['isbn']?>"> 
                        </li>
                    </button>
                </form>
            <?php
                }
            ?>
        </ul>
        
        <?php
    }else{
        echo 'NO DATA FOUND';
    }
}