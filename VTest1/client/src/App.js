import Approuter from "./Approuter";
import HomeFooter from "./Component/HomeComponents/HomeFooter";
import HomeNavbar from "./Component/HomeComponents/HomeNavbar";
import { BrowserRouter as Router } from "react-router-dom";
import Test1 from "./Test/Test1";

function App() {
  return (
    <>

      <Router>
        <HomeNavbar />
        <Test1 />
        <Approuter />
        <HomeFooter />

      </Router>

    </>
  );
}

export default App;
