import React from 'react';
import Picker from 'react-month-picker'




class monthPicker extends React.Component {
    date;


    constructor(props, context) {
        super(props, context)

        this.state = {
            singleValue: {year: 2021, month: 1},
        }

        this.pickAMonth = React.createRef()
    }

    render() {
        const pickerLang = {
            months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            from: 'From', to: 'To',
        }
        const {singleValue} = this.state

        const makeText = m => {
            if (m && m.year && m.month) return (pickerLang.months[m.month - 1] + '. ' + m.year)
            return '?'
        }

        return (

                    <div className="edit monthPicker-position">
                        <Picker
                            ref={this.pickAMonth}
                            years={[2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029, 2030]}
                            value={singleValue}
                            lang={pickerLang.months}
                            onChange={this.handleAMonthChange}
                            onDismiss={this.handleAMonthDissmis}
                        >
                            <button type="button"
                                    onClick={this.handleClickMonthBox}
                                    className="btn-enlarge-animation btn-custom search-btn box-shadow"><i className="far fa-calendar-alt fa-3x"></i>
                            </button>
                        </Picker>
                    </div>

        )
    }

    handleAMonthChange = (year, month) => {
        let newState = {
            singleValue: {
                year: year,
                month: month
            },
        }
        this.props.date(newState.singleValue);
    }

    handleAMonthDissmis = (value) => {
        this.setState( {singleValue: value} )
    }

    handleClickMonthBox = (e) => {
        this.pickAMonth.current.show()
    }


}




export default monthPicker















