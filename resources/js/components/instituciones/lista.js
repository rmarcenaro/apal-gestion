import axios from 'axios'
import React, { Component } from 'react'
import ReactDOM from 'react-dom'

class InstitucionFila extends Component {

    render(){
        return(
            <tr>
                <td>
                    <a href={"/instituciones/editar/" + this.props.institucion.id} alt='Editar' title='Editar'>
                        {this.props.institucion.nombre}
                    </a>
                </td>
                <td>
                    { this.props.institucion.estado_id ? 'Activa' : 'Inactiva' }
                </td>
                <td>
                    <a href={"/instituciones/editar/" + this.props.institucion.id} alt='Editar' title='Editar'>
                        Editar
                    </a>
                </td>
            </tr>
        );
    }

}

class InstitucionLista extends Component {

    constructor () {
        super()
        this.state = {
            instituciones: []
        }
    }

    componentDidMount () {
        axios.get('/api/instituciones').then(response => {
          this.setState({
              instituciones: response.data.data
          })
        })
    }

    render() {

        const { instituciones } = this.state

        //if (!instituciones.length) {
        if (instituciones && instituciones.data && instituciones.data.length == 0){

            return (

                <div className='container'>
                <div className='row justify-content-center'>
                    <div className='col-md-8'>
                        <div className='card'>
                            <div className='card-header'>Lista de Instituciones</div>

                            <div className='card-body'>
                                <div className='alert alert-success' role='alert'>
                                    [SESSIONSTATUS]
                                </div>
                                <div className='table-responsive'>
                                <table className='table table-condensed table-hover' key='tabla-instituciones'>
                                    <thead>
                                        <tr>
                                            <th>Institución</th>
                                            <th>Activa</th>
                                            <th className='text-center'>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colSpan="3">No existen instituciones registradas.</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            )

        } else {

            return (

                <div className='container'>
                <div className='row justify-content-center'>
                    <div className='col-md-8'>
                        <div className='card'>
                            <div className='card-header'>Lista de Instituciones</div>

                            <div className='card-body'>
                                <div className='alert alert-success' role='alert'>
                                    [SESSIONSTATUS]
                                </div>

                                <div className='table-responsive'>
                                    <table className='table table-condensed table-hover' key='tabla-instituciones'>
                                        <thead>
                                            <tr>
                                                <th>Institución</th>
                                                <th>Activa</th>
                                                <th className='text-center'>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {instituciones.map(institucion => (
                                                <InstitucionFila key={"institucion-"+institucion.id} institucion={institucion} />
                                            ))}

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                </div>
            )

        }

    }

}

export default InstitucionLista

if (document.getElementById('apalapp')) {
    ReactDOM.render(<InstitucionLista />, document.getElementById('apalapp'))
}
