<?php
/*
 * Produces the high score table for the players at the end of the game
 */
function produceHighScoreTable( $PostData ) {
    $link = estConnection();
    $stmt = mysqli_prepare( $link, "SELECT Score, Device, Misses
    	     FROM Game
    	     WHERE Device = ?
    	     LIMIT 10" );
	mysqli_bind_param($stmt, 's', $Device );
	
	$Device = $PostData['input'];
	
	mysqli_execute( $stmt );
	
	mysqli_stmt_bind_result( $stmt, $Score, $Device, $Misses );
	
    $allRows = mysqli_query($link, $stmt);
    echo "<table>\n";
    echo "<tr>\n";
    while ($oneRow = mysqli_fetch_assoc($allRows)) {
        echo "<th>Score</th>\n";
        echo "<th>Device</th>\n";
        echo "<th>Misses</th>";
        echo "</tr>\n";
        echo "<td>", strToHtml($oneRow['Score']), "</td>\n";
        echo "<td>", strToHtml($oneRow['Device']), "</td>\n";
        echo "<td>", strToHtml($oneRow['Misses']), "</td>\n";
        echo "</tr>\n";

    }
	echo "</table>";
    mysqli_close($link);
}
/*
 * Produces the score table for the player.
 */
function produceScoreTable(){
	$link = estConnection();
    $stmt = mysqli_prepare( $link, "SELECT Score, Device, Misses
    	     FROM Game
    	     WHERE Device = ?" );
	mysqli_bind_param($stmt, 's', $Device );
	
	$Device = $PostData['input'];
	
	mysqli_execute( $stmt );
	
	mysqli_stmt_bind_result( $stmt, $Score, $Device, $Misses );
	
	$allRows = mysqli_query($link, $stmt);
    echo "<table>\n";
    echo "<tr>\n";
    while (mysqli_fetch($stmt)) {
        echo "<th>Score</th>\n";
        echo "<th>Device</th>\n";
        echo "<th>Misses</th>";
        echo "</tr>\n";
        echo "<td>", strToHtml($oneRow['Score']), "</td>\n";
        echo "<td>", strToHtml($oneRow['Device']), "</td>\n";
        echo "<td>", strToHtml($oneRow['Misses']), "</td>\n";
        echo "</tr>\n";
    }
    echo "</table>";
    mysqli_close($link);
}

/*
* Call with the array of target information (?at the end of the game maybe??)
*/


function addTargetData( $targetData ){
	$conn = estConnection();

	//insert statement for the Target table
	$insertTarget = mysqli_prepare( $conn, "INSERT INTO `Target`(`Game_ID`, `Target_Direction`, `Target_size`, `Time`, `Misses` )
									VALUES (?,?,?,?,?)" );
		  
	mysqli_stmt_bind_param( $insertStatement, 'dssdd', $Game_ID, $Target_Direction, $Target_Size, $Time, $Misses );
	  
	$Game_ID = $targetData['game_id'];
	$Target_Size = $targetData['target_direction'];
	$Target_Size = $targetData['target_size'];
	$Time = $targetData['time'];
	$Misses = $targetData['misses'];	

	mysqli_close( $conn ); //closing the connection
	
}

//Call when game ends 
function addGameData( $gameData ){
	$conn = estConnection();

	//insert statement for the Game table
	$insertGame = mysqli_prepare( $conn, "INSERT INTO `Game`(`Device`, `Age`, `Score` )
								  VALUES (?,?,?)" );
		  
	mysqli_stmt_bind_param( $insertGame, 'sss', $Device, $Age, $Score );
	  
	$Device = $gameData['device'];
	$Age = $gameData['age'];
	$Score = $gameData['score'];

	mysqli_stmt_execute($insertGame);	
	mysqli_close( $conn ); //closing the connection 
}

function estConnection(){
	//connection parameters
	$dbhost = "localhost";
	$dbusername = "proj3";
	$dbpassword = "yourmumm8";
	$dbname = "proj3";

	$conn = mysqli_connect( $dbhost, $dbusername, $dbpassword, $dbname ); 

	return $conn;
} 
?>