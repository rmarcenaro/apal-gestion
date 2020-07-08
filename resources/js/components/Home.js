import axios from 'axios'
import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { Link } from 'react-router-dom'

class Home extends Component {

    constructor () {
        super()
    }

    componentDidMount () {

    }

    render() {

        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-12">
                        <p>Escritorio</p>
                    </div>
                </div>
            </div>
        )

    }

}

export default Home

if (document.getElementById('apalapp')) {
    ReactDOM.render(<Home />, document.getElementById('apalapp'))
}
