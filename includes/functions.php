<?php
	function AddMessageSession($code,$type,$lib)
	{
		$_SESSION["messages"][] = array("code" => $code, "Type"=> $type, "lib" => $lib);
	}
        /**
         * DisplayMessage()
         * 
         * @return boolean
         */
	function DisplayMessage()
	{
		$message = false;
		if ((!empty($_SESSION)) && sizeof($_SESSION["messages"])>0)
		{
			$message = true;
			foreach ($_SESSION["messages"] as $tabMessage)
			{		
				switch ($tabMessage["Type"]){
					case "Valid":
						echo "<p class='Valid' style= 'color:green'>";
						break ;
					case "info" :
						echo "<p style= 'color:brown'>";
						break ;
					case "warning":
						echo "<p class='Warning' style= 'color:orange'>";
						break ;
					default :
						echo "<p class='Error' style= 'color:red'>";
						break ;
				}	
				echo $tabMessage["lib"];
				echo "</p>\n";
				
			}

		}
		return $message;
	}