import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch, useLocation, Redirect } from 'react-router-dom'
import Header from './Header'
import Home from './Home'
import NotFound from './NotFound'
import InstitucionLista from './instituciones/lista'
import InstitucionEditar from './instituciones/editar'

class DebugRouter extends BrowserRouter {
  constructor(props){
    super(props);
    console.log('initial history is: ', JSON.stringify(this.history, null,2))
    this.history.listen((location, action)=>{
      console.log(
        `The current URL is ${location.pathname}${location.search}${location.hash}`
      )
      console.log(`The last navigation action was ${action}`, JSON.stringify(this.history, null,2));
    });
  }
}

class App extends Component {

    render () {

        return (
            <DebugRouter>
            <BrowserRouter>
            <div>
                <Header />
                <Switch>
                    <Route exact path='/' component={Home} />
                    <Route exact path='/instituciones' component={InstitucionLista} />
                    <Route path='/instituciones/editar/:id' component={InstitucionEditar} />
                </Switch>
            </div>
            </BrowserRouter>
            </DebugRouter>
        )

    }

}

ReactDOM.render(<App />, document.getElementById('app'))
