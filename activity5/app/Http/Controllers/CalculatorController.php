<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    // function para ma calculate yung result, may parameters na operator at dalawang operands
    function calculate($operation, $no1, $no2){
        // kapag yung operation ay add, i add ang dalawang operands at return ang result
        if($operation == "add"){
            return $no1 + $no2; // return yung result
        }
        // kapag yung operation ay minus, i minus ang dalawang operands at return ang result
        else if($operation == "subtract"){
            return $no1 - $no2; // return yung result
        }
        // kapag yung operation ay times, i times ang dalawang operands at return ang result
        else if($operation == "multiply"){
            return $no1 * $no2; // return yung result
        }
        // kapag yung operation ay divide, i divide ang dalawang operands at return ang result
        else if($operation == "divide"){
            //kapag yung pangalawang operand ay 0, return ay Error
            if($no2 == 0){
                return "Error cannot be divided by 0"; // return yung result
            }
            return $no1 / $no2; // return yung result
        } else {
            return "Error"; // return yung result
        }
    }

    // i assign sa variables yung result nung calculation


    // ginagamit to para malaman yung kulay nung input sa url
    function inputColor($no) {
        return ($no % 2 == 0) ? "blue" : "orange";  // return yung result na kulay
    }
    // ito naman yung kulay para sa output
    function outputColor($no){
        // kapag yung output ay error, magiging red yung kulay na i re return
        if($no == "Error cannot be divided by 0"){
            return "red"; // return yung result na kulay
        }
        return ($no % 2 == 0) ? "green" : "blue";  // return yung result na kulay
    }

    // output kung error ba sa box or yung result sa calcuation
    function outputMessage($output){
        if($output == "Error cannot be divided by 0"){
            return "Error"; // return yung result 
        }
        return $output; // return yung result 
    }

    
    function calculateResults($operation1, $num1, $num2, $operation2, $num3, $num4){
        $output1 = $this-> calculate($operation1, $num1, $num2);
        $output2 = $this->calculate($operation2, $num3, $num4);
    return "
      <h1>Paolo Ignacio BSIT 3C </h1>
      <p>Value 1: <span style='color: " . $this->inputColor($num1) .";'>$num1</span></p>
      <p>Value 1: <span  style='color: " . $this->inputColor($num2) . ";'> $num2 </span></p>
      <p>Operator: $operation1</p>
      <span style='color: ". $this->outputColor($output1) .";'> Result (Displayed in ". $this->outputColor($output1) .")</span>
      <div style='display: inline-block; padding: 10px; width: 50px; height: 20px; 
                text-align: center; line-height: 20px; border-radius: 5px;
                background-color: " .  $this->outputColor($output1) . "; color: white; font-weight: bold;'>
              " . $this->outputMessage($output1) . " 
      </div>
      <p>Value 1:<span  style='color: " . $this->inputColor($num3) .";'> $num3</span></p>
      <p >Value 1: <span style='color: " . $this->inputColor($num4).";'>$num4</span></p>
      <p>Operator: $operation2</p>
      <span style='color: ". $this->outputColor($output2) .";'> Result (Displayed in ". $this->outputColor($output2) .")</span>
      <div style='display: inline-block; padding: 10px; width: 50px; height: 20px; 
                text-align: center; line-height: 20px; border-radius: 5px;
                background-color: " .  $this->outputColor($output2) . "; color: white; font-weight: bold;'>
               " .  $this->outputMessage($output2) . " 
      </div>
    ";
    }
}
