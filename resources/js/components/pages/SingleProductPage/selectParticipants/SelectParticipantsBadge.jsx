import React from 'react';
import { useMemo } from 'react';
import DatePicker from 'react-datepicker';
import SelectButton from './SelectButton';

const SelectParticipantsBadge = ({
	item,
	setBookingConformationInputValue,
	bookingConformationInputValue,
	calculatedIndividualAmount,
	setCalculatedIndividualAmount,
	individualAmountData,
}) => {
	const { id, title, type, value } = item;
	const conditions = {
		date: (
			<DatePicker
				selected={bookingConformationInputValue.tourDate}
				onChange={(date) =>
					setBookingConformationInputValue((prev) => ({
						...prev,
						tourDate: date,
					}))
				}
				minDate={new Date()}
				className="date-picker"
			/>
		),
		button: (
			<SelectButton
				id={id}
				title={title}
				setBookingConformationInputValue={setBookingConformationInputValue}
				calculatedIndividualAmount={calculatedIndividualAmount}
				setCalculatedIndividualAmount={setCalculatedIndividualAmount}
				individualAmountData={individualAmountData}
			/>
		),
		text: value || '',
	};

	const comp = useMemo(() => {
		return conditions[type];
	}, [item]);

	return (
		<div className="select-participants-badge">
			<div className="select-participants-title">{title}</div>
			{type === 'text' ? (
				<div
					className="select-participants-body"
					style={type === 'text' && { marginTop: '20px' }}
				>
					{comp}
				</div>
			) : (
				<div className="select-participants-body">{comp}</div>
			)}
		</div>
	);
};

export default SelectParticipantsBadge;
