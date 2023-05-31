const SelectButton = ({
	title,
	setBookingConformationInputValue,
	calculatedIndividualAmount,
	setCalculatedIndividualAmount,
	individualAmountData,
}) => {
	const arr = [];
	for (let i = 0; i < 100; i++) {
		title === 'Adult'
			? arr.push({ value: i + 1, displayValue: i + 1 })
			: arr.push({ value: i + 0, displayValue: i + 0 });
	}
	const optionData = arr.map((item, idx) => {
		return (
			<option value={item.value} key={idx}>
				{item.displayValue}
			</option>
		);
	});

	return (
		<select
			className="select-button"
			name={title}
			onChange={(e) => {
				title === 'Adult'
					? setBookingConformationInputValue((prev) => ({
							...prev,
							adult: e.target.value,
					  }))
					: title === 'Children'
					? setBookingConformationInputValue((prev) => ({
							...prev,
							children: e.target.value,
					  }))
					: setBookingConformationInputValue((prev) => ({
							...prev,
							infant: e.target.value,
					  }));
				title === 'Adult'
					? setCalculatedIndividualAmount((prev) => {
							return {
								...prev,
								adult: individualAmountData.adult * Number(e.target.value),
							};
					  })
					: title === 'Children'
					? setCalculatedIndividualAmount((prev) => {
							return {
								...prev,
								children: individualAmountData.children * Number(e.target.value),
							};
					  })
					: setCalculatedIndividualAmount((prev) => {
							return {
								...prev,
								infant: individualAmountData.infant * Number(e.target.value),
							};
					  });
			}}
		>
			{optionData}
		</select>
	);
};

export default SelectButton;
