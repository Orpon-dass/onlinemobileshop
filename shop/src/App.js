import "../node_modules/bootstrap/dist/css/bootstrap.min.css"
import "../node_modules/bootstrap/dist/js/bootstrap.bundle"
import { BrowserRouter, Switch } from "react-router-dom";
import Blueprint from "./Component/Blueprint";

function App() {
  return (
                          <BrowserRouter>
                                <Switch>
                                     <Blueprint />
                                </Switch>
                            </BrowserRouter>

  
  );
}

export default App;
