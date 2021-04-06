<!-- Update on Feb 1,2018 by RB -->
<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="msit"> How do you know MSIT: </label>
	<div class="col-sm-9">
		<span class="block input-icon input-icon-right">
			<select id="msit" name="msit" title="How do you know MSIT" required>
				<option value="media">News Paper/Print Media</option>
				<option value="socialnw">Social Network</option>
				<option value="alumni">MSIT Alumni</option>
				<option value="friends">Friends/Relatives</option>
				<option value="msitad">MSIT Ad</option>
				<option value="others">Others</option>
			</select> 
			&nbsp;&nbsp;

			<select id="socialnw" name="socialnw" title="How do you know MSIT">
				<option value="facebook">Facebook</option>
				<option value="twitter">Twitter</option>
				<option value="linkedin">LinkedIn</option>
				<option value="google+">Google+</option>
			</select>

			<select id="media" name="media" title="How do you know MSIT">
				<option value="eenadu">Eenadu Newspaper</option>
				<option value="sakshi">Sakshi</option>
				<option value="hindu">Hindu</option>
				<option value="jyothi">Andhra Jyothi</option>
			</select>

			<select id="msitad" name="msitad" title="How do you know MSIT">
				<option value="website">MSIT Website</option>
				<option value="brochure">Brochure</option>
				<option value="poster">Poster</option>
				<option value="campaign">Campaign</option>
			</select>

			<input  type="text" id="others" name="others" placeholder="Please specify" required />
		</span>
	</div>
</div>

<script type="text/javascript">
	$("#media").show();
	$("#socialnw").hide();
	$("#msitad").hide();
	$("#others").hide();


	$(document).ready(function(){
	    $("#msit").change(function(){
	        var val = document.getElementById("msit").value;
	        //alert("this is "+val);
	        if(val === "media"){
	        	//alert("here");
	            $("#media").show();
				$("#socialnw").hide();
				$("#msitad").hide();
				$("#others").hide();
	        }
	        else if(val === "socialnw"){
	        	//alert("here");
	            $("#socialnw").show();
	            $("#media").hide();
	            $("#msitad").hide();
				$("#others").hide();
	        }
	        else if(val === "msitad"){
	        	//alert("here");
	            $("#socialnw").hide();
	            $("#media").hide();
	            $("#msitad").show();
				$("#others").hide();
	        }
	        else if(val === "others"){
	        	//alert("here");
	            $("#socialnw").hide();
	            $("#media").hide();
	            $("#msitad").hide();
				$("#others").show();
	        }
	        else {
	        	//alert("here");
	            $("#socialnw").hide();
	            $("#media").hide();
	            $("#msitad").hide();
				$("#others").hide();
	        }

	    });
	    
});
</script>
