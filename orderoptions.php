<?php 

$orders = "ordertype";

$options = "";

switch ($orders) {
	case 'New Order':
		$options = "<div class='col-md-4'>
		<img scr='images'/ar-4.png>
		<table class='table table-bordered table-striped'>
		  <thead>
		    <tr>
		      <th>S/N</th>
		      <th>Equipment</th>
		      <th>Price</th>
		    </tr>
		  </thead>

		  <tbody>
		    <tr>
		      <td>1</td>
		      <td>Autoref</td>
		      <td>1,895,000</td>
		    </tr>
		  </tbody>
		</table>
        
        <p>
        Technical Data<br>
        Tiltable color and touch screen with keratometer, auto tracking, motorized chinrest, Touch screen, more easy operate. Larger 7'' TFT LCD monitor. Motorized joystick for easier operation. Up to 85° titable touch screen for user-friendly operability. Faster and more accurate measurement
       </p>
		</div>";
		break;
	
		case 'Pending Order':
		$options = "<div class='col-md-4'>
		<img scr='images'/combi-r3.png>
		<table class='table table-bordered table-striped'>
		  <thead>
		    <tr>
		      <th>S/N</th>
		      <th>Equipment</th>
		      <th>Price</th>
		    </tr>
		  </thead>

		  <tbody>
		    <tr>
		      <td>1</td>
		      <td>Combi Unit</td>
		      <td>2,300,000</td>
		    </tr>
		  </tbody>
		</table>
        
        <p>
        Spec:<br>
         It is equipped with a sliding table top for two instruments. Only Left-handed versions are available. It is equipped with a foldaway drawer, sited in a convenient position, for placing ophthalmoscope and retinoscope, protected from dust. Choice of other colours are available in Blue, yellow, green, bordeaux, grey and dark brown.
        </p>
		</div>";
		break;

		case 'Successful Order':
		$options = "<div class='col-md-4'>
		<img scr='images'/vent-r4.png>
		<table class='table table-bordered table-striped'>
		  <thead>
		    <tr>
		      <th>S/N</th>
		      <th>Equipment</th>
		      <th>Price</th>
		    </tr>
		  </thead>

		  <tbody>
		    <tr>
		      <td>1</td>
		      <td>Ventilator</td>
		      <td>3,570,000</td>
		    </tr>
		  </tbody>
		</table>
        
        <p>
        FEATURES:<br>
        The Dräger Savina 300 Classic combines the independence and power of a turbine-driven ventilation system with a wide range of ventilation modes. The large color touch screen and intuitive operating system make operation simple.
       </p>
		</div>";
		break;

	default:
		$options = "<div class='col-md-4'>
		<img scr='images'/vent-r4.png>
		<table class='table table-bordered table-striped'>
		  <thead>
		    <tr>
		      <th>S/N</th>
		      <th>Equipment</th>
		      <th>Price</th>
		    </tr>
		  </thead>

		  <tbody>
		    <tr>
		      <td>1</td>
		      <td>-</td>
		      <td>-</td>
		    </tr>
		  </tbody>
		</table>
        
        <p>
        You are yet to place any order
        </p>
		</div>";
		break;
}

echo $orders;
?>