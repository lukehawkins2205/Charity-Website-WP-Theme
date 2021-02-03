import React from 'react';

class card extends React.Component {

    constructor(props) {

        super(props)

    }

    render() {


        return (
        <div>Card<button onClick={this.fire}>fire</button></div>

        )
    }
    fire = () => {
        console.log('REACT - card - props', this.props)
    }
}



export default card
