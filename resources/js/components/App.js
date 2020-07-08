import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Header from './Header'
import Home from './Home'
import InstitucionLista from './instituciones/lista'

class App extends Component {

    render () {

        return (
            <BrowserRouter>
            <div>
                <Header />
                <Switch>
                    <Route exact path='/' component={Home} />
                    <Route exact path='/instituciones' component={InstitucionLista} />
                </Switch>
            </div>
            </BrowserRouter>
        )

    }

}

ReactDOM.render(<App />, document.getElementById('app'))
