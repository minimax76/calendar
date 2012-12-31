<div id="main">
    <!--
    <table border="1">
    <tr>
    <?php
    /*
    for ($i=0;$i<6;$i++) {
        $diff = date("w")-1;
        echo "<td>".date("D",mktime(0,0,0,date("m"),(date("d")-$diff)+$i,date("Y")))."</td>";
    }
    ?>
    </tr>
    <?php
    for ($i=0;$i<23;$i++) {
        echo "<tr><td>".date(("H:i"),mktime(8,(0+30)*$i,0,date("m"),date("d"),date("Y")))."</td></tr>";
    }
    */
    ?>
    </table>
    -->
    <?php
  	if (!isset($_GET['day']) OR $_GET['day']=='') {
			$giorno = date("d");
		} else {
			$giorno = $_GET['day'];
		}
		if (!isset($_GET['month']) OR $_GET['month']=='') {
			$mese = date("m");
		} else {
			$mese = $_GET['month'];
		}
		if (!isset($_GET['year']) OR $_GET['year']=='') {
			$anno = date("Y");
		} else {
			$anno = $_GET['year'];
		}
		
		$successivo = mktime(0,0,0,$mese,$giorno,$anno)+604800;
		$precedente = mktime(0,0,0,$mese,$giorno,$anno)-604800;
		
		$giorno_succ = date("d",$successivo);
		$giorno_prec = date("d",$precedente);
		
		$mese_succ = date("m",$successivo);
		$mese_prec = date("m",$precedente);
		
		$anno_succ = date("Y",$successivo);
		$anno_prec = date("Y",$precedente);
		
		if ((isset($_GET['day']) AND $_GET['day']!='') AND (isset($_GET['month']) AND $_GET['month']!='') AND (isset($_GET['year']) AND $_GET['year']!='')) {
		$d = $_GET['day'];
		$m = $_GET['month'];
		$Y = $_GET['year'];
		}
		echo "<div id=\"mesi\">";
			echo "<div id=\"sx\">";
				echo "<a href=\"index.php?modulo=main&day=$giorno_prec&month=$mese_prec&year=$anno_prec\">&laquo; precedente</a>";
			echo "</div>";
			echo "<div id=\"cx\">";
				if (!isset($_GET['day']) OR !isset($_GET['month']) OR !isset($_GET['year']) OR $_GET['day']=='' OR $_GET['month']=='' OR $_GET['year']=='') {
					echo "<p>".date("F")." ".date("Y")."</p>";
				} else {
					echo "<p>".date("F",mktime(0,0,0,$m,$d,$Y))." ".$Y."</p>";
				}
			echo "</div>";
			echo "<div id=\"dx\">";
				echo "<a href=\"index.php?modulo=main&day=$giorno_succ&month=$mese_succ&year=$anno_succ\">successivo &raquo;</a>";
			echo "</div>";
		echo "</div>";
		
	?>
    <table id="calendario">
        <tr>
            <th class="ore">
            </th>
			<?php
			if (!isset($_GET['day']) OR !isset($_GET['month']) OR !isset($_GET['year']) OR $_GET['day']=='' OR $_GET['month']=='' OR $_GET['year']=='') {
				for ($i=0;$i<6;$i++) {
					$diff = date("w")-1;
					$mese_th = date("m",mktime(0,0,0,date("m"),(date("d")-$diff)+$i,date("Y")));
					if ($mese_th % 2 == '0') {
						if (date("d-m-Y",mktime(0,0,0,date("m"),(date("d")-$diff)+$i,date("Y"))) == date("d-m-Y")) {
							echo "<th id=\"oggi\" class=\"scuro\">";
						} else {
							echo "<th class=\"scuro\">";
						}
					} else {
						if (date("d-m-Y",mktime(0,0,0,date("m"),(date("d")-$diff)+$i,date("Y"))) == date("d-m-Y")) {
							echo "<th id=\"oggi\" class=\"chiaro\">";
						} else {
							echo "<th class=\"chiaro\">";
						}
					}
					if (date("d-m-Y",mktime(0,0,0,date("m"),(date("d")-$diff)+$i,date("Y"))) == date("d-m-Y")) {
						echo date("d",mktime(0,0,0,date("m"),(date("d")-$diff)+$i,date("Y")))." ".date("D",mktime(0,0,0,date("m"),(date("d")-$diff)+$i,date("Y")))." - Oggi";
					} else {
						echo date("d",mktime(0,0,0,date("m"),(date("d")-$diff)+$i,date("Y")))." ".date("D",mktime(0,0,0,date("m"),(date("d")-$diff)+$i,date("Y")));
					}
					echo "</th>";
				}
			} else {
				for ($i=0;$i<6;$i++) {
					$diff = date("w",mktime(0,0,0,$m,$d,$Y))-1;
					$mese_th = date("m",mktime(0,0,0,date("$m"),(date("$d")-$diff)+$i,date("$Y")));
					if ($mese_th % 2 == '0') {
						if (date("d-m-Y",mktime(0,0,0,date("$m"),(date("$d")-$diff)+$i,date("$Y"))) == date("d-m-Y")) {
							echo "<th id=\"oggi\" class=\"scuro\">";
						} else {
							echo "<th class=\"scuro\">";
						}
					} else {
						if (date("d-m-Y",mktime(0,0,0,date("$m"),(date("$d")-$diff)+$i,date("$Y"))) == date("d-m-Y")) {
							echo "<th id=\"oggi\" class=\"chiaro\">";
						} else {
							echo "<th class=\"chiaro\">";
						}
					}
					if (date("d-m-Y",mktime(0,0,0,date("m"),(date("d")-$diff)+$i,date("Y"))) == date("d-m-Y")) {
						echo date("d",mktime(0,0,0,date("$m"),(date("$d")-$diff)+$i,date("$Y")))." ".date("D",mktime(0,0,0,date("$m"),(date("$d")-$diff)+$i,date("$Y")))." - Oggi";
					} else {
						echo date("d",mktime(0,0,0,date("$m"),(date("$d")-$diff)+$i,date("$Y")))." ".date("D",mktime(0,0,0,date("$m"),(date("$d")-$diff)+$i,date("$Y")));
					}
					echo "</th>";
				}
			}
            ?>
        </tr>
		<?php
        $inizio = mktime(8,0,0,date("m"),date("d"),date("Y"));
        $fine = mktime(19,0,0,date("m"),date("d"),date("Y"));
        $step = 1800;
        $orari = range($inizio, $fine, $step);
        
        foreach ($orari as $key=>$value) {
            echo "<tr><td>".date("H:i",$value)."</td>";
			for ($i=0;$i<6;$i++) {
				if (!isset($_GET['day']) OR !isset($_GET['month']) OR !isset($_GET['year']) OR $_GET['day']=='' OR $_GET['month']=='' OR $_GET['year']=='') {
					$diff = date("w")-1;
					$a = mktime(date("H",$value),date("i",$value),0,date("m"),(date("d")-$diff)+$i,date("Y"));
				} else {
					$diff = date("w",mktime(0,0,0,$m,$d,$Y))-1;
					$a = mktime(date("H",$value),date("i",$value),0,date("$m"),(date("$d")-$diff)+$i,date("$Y"));
				}
					
					$sql = "SELECT a.*, b.*, c.* FROM tb_1 a, tb_2 b, tb_3 c WHERE a.ora_inizio<='$a' AND a.ora_fine>='$a'";
					$query = mysql_query($sql);
					$count = mysql_num_rows($query);
					if ($count >0) {
						while ($array = mysql_fetch_array($query)) {
							echo "<td class=\"prenotato\">";
							echo "<p>...</p>";
							echo "</td>";
						}
					} else {
							echo "<td class=\"vuoto\"></td>";
						//echo $a;
					}
			}
			echo "</tr>";
        }
        ?>
    </table>
    
</div>
