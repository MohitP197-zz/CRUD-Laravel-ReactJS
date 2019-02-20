import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class App extends Component {
    constructor(props){
        super(props);
        this.state = {
            name: '',
            tasks: []
        };

        //bind
        this.handleChange = this.handleChange.bind(this);
    }

    //handle change
    handleChnage(e)
    {
        this.setState({
           name: e.target.value
        });
        console.log('onChange',this.state.name);
    }
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Create Task</div>
                            <div className="card-body">
                                <form>
                                    <div className="form-group">
                                        <textarea
                                            className="form-control"
                                            rows="5"
                                            placeholder="Create a new task"
                                            required
                                        />
                                    </div>
                                    <button type="submit" className="btn btn-primary">
                                        Create Task
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
