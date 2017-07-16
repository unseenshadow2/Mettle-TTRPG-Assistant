// ------- RegExp ------
var input = /expression/gi

// ----- Functions -----
// Takes the value of a element and places it within the innerHTML of another object.
function displayText(from_id, to_id)
{
	document.getElementById(to_id).innerHTML = document.getElementById(from_id).value;
}

// Takes a string and uses it as the inner html for id
function displayString(id, toDisplay)
{
	document.getElementById(id).innerHTML = toDisplay;
}

// Shows the innerHTML of an element in an alert popup
function checkHTML(from_id)
{
	window.alert(document.getElementById(from_id).innerHTML);
}

// Updates the innerHTML for any instances of input
// NOTE: Currently only works with input tags... will get better with time
function updateInnerHTML( id ) 
{
	const e = document.getElementById( id ),
        elements = e.querySelectorAll( "input, select, textarea" ); // all expected tags
	
	// Update our elements
	if ( elements )
	{
		elements.forEach( ( i ) => 
		{
			switch ( i.tagName.toLowerCase() ) 
			{
				case "input": i.setAttribute( "value", i.value ); break;
				
				case "select":
				const optns = i.querySelectorAll( "option" ),
					pre_slctd = i.querySelector( "[selected]" );
					
				if ( pre_slctd ) 
				{
					pre_slctd.removeAttribute( "selected" ); // remove prior selections
				}
				
				optns[ i.selectedIndex ].setAttribute( "selected", "selected" );
				break;
				
				case "textarea": i.textContent = i.value; break;
			}
		} );
	}
	
	// Return the final product
	return e.innerHTML
}