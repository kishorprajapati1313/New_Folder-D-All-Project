import React, { useState } from 'react';
import './App.css';
import Navbar from './Component/Navbar';
import Textbox from './Component/Textbox';
import Alert from './Component/Alert';
import About from './Component/about';

import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";


function App() {
  const [mode, setmode] = useState('light');
  const [alert, setalert] = useState(null);

  const showalert = (mess, type)=>{
      setalert({
        msg: mess,
        type: type
      })

      setTimeout(()=>{
        setalert(null);
      }, 1260);
  }

  const togglemode = ()=>{
    if(mode === 'light'){
      setmode('dark');
      document.body.style.backgroundColor = "#050925";
      showalert ("Dark mode is just enable ", "success");
      document.title = "My Reaact App - Dark mode enable";
    }
    else{
      setmode('light');  
      document.body.style.backgroundColor = "white";
      showalert ("Light mode is just enable ", "success");
      document.title = "My Reaact App - Light mode enable";
    }
  }
  return (
    <>
    <Router>
    <Navbar title="React is here1" mode={mode} toggle={togglemode}/>
    <Alert alert = {alert}/>

    <div className="container my-3">
    <Switch>
          <Route path="/about">
            <About />
          </Route>
         
          <Route path="/">
              <Textbox showalert = {showalert} heading="Enter The text to analyze" mode={mode} />
         
          </Route>
        </Switch>

    </div>
    </Router>
    </>
 
  );
}

export default App;
