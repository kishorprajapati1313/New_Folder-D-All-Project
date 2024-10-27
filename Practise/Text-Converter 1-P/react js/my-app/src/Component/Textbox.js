
import React, {useState} from 'react'


export default function Textbox(props) {

    const handlecase = () =>{
        
        const setcount = caseCount + 1;
        setCaseCount(setcount);

        if(setcount %2 === 0){
            // console.log("clciked");
            let newtext = text.toUpperCase();
            textcount(newtext);
            props.showalert("Converted into the Upper case", "success")
        }else{
            let newtext = text.toLowerCase();
            textcount(newtext)
            props.showalert("Converted into the LoWer case", "success")
        }
    }
    const handlechange = (event) =>{
        console.log("change");
        textcount(event.target.value)
    }


    const [text,textcount] = useState("");
    const [caseCount,setCaseCount] = useState(0);
    
    // text = "updated state" //wrong way
    // textcount("updated"); //right way
  return (

    <>
    <div className='container' style={{color: props.mode === 'dark'?'white' : 'black'}}>   

        <div className="mb-3">
            <h1>{props.heading}</h1>
                <textarea className="form-control" id="mybox" value={text} onChange={handlechange} 
                        style={{backgroundColor: props.mode === 'dark'?'grey' : 'white',
                                color: props.mode === 'dark'?'white' : 'black'}} 
                        rows="8" placeholder="Enter your text"></textarea>
        </div>

        <button className="btn btn-primary" onClick={handlecase}>Conver to uppercase</button>

    </div>

    <div className="container my-2" style={{color:props.mode === 'dark' ? 'white' : 'black'}}>
        <h1>Your Text Summery</h1>
        <p> {text.split(" ").length} word  &  {text.length} charchter</p>
        <p> {0.008 * text.split("").length } Minites</p>
        <h2>Perview</h2>
        <p>{text}</p>
    </div>
    </>
  )
}
