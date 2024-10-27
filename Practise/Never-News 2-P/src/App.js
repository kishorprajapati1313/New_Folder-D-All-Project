import './App.css';
import React, { Component } from 'react'
import Navbar from './Component/Navbar';
import Newss from './Component/Newss';




export default class App extends Component {
  render() {
    return (
      <div>
         <Navbar/> 
        <Newss pagesize={5} country="in" category="entertainment"/>
        
      </div>
    )
  }
}



