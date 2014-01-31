//Create code that goes in the database and 
        //then spits out the amount of results to the web page.

        function listItemChecker(){
    		var el = this;
        	var itemObject = [0,1,2,3,4,5,6,7,8,9];
        	var elPfx = "_listItem_";

	        for(i = 1; i <= amountOfItems; i++){
	        	//List out the items
	        	//check to see if this item is being used or under editing, if they are, disable a user from using that item
	        	if(checkInUse(itemObject[i].inUse)){
	        		enableClickable((elPfx + i));	
	        	}else{
	        		disableClickable((elPfx + i));
	        	}
	        	
	        }

	        el.checkInUse = function(obj){
        		if(obj){
        			//the object is in use, disable access to using it
        			return false;
        		}else{
        			//if not, then dispay users
        			return true;
        		}
	        }

	        el.enableClickable = function(obj){
	        	//add a class to the list item
	        	//make the item clickable
	        	//remove any trace of the disable class
	        }
	        el.disableClickable = function(obj){
	        	//remove the enable class
	        	//change the ui to reflect disabled
        		//remove clickability
	        }

        }//end listItemChecker

        var myListChecker = new listItemChecker();

        //Okay so this is theory code for the front end, yet there still needs to be a check 
        //in the backend to see if a user has still tried to access that objects page
        //So, you will have to create another check in the backend for the 'inuse' attribute.
        //If its true, then you need to die or redirect the user with an error message
        //that tells them that they cannot edit the item because it is in-use.

        //Another issue I have encountered is this, what if a user gets disconnected, the
        //'in-use' attribute is still active in the db. That means, when the user comes
        //back online to edit the file, it will stil say 'in-use' Maybe I can use AJAX?
