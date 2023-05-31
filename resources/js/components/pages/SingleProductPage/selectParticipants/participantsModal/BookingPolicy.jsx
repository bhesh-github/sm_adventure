import React from "react";
const BookingPolicy = ({ policyData }) => {
  const { title = "", policy = "" } = policyData;
  return (
    <div className="booking-policy-content">
      <h6 className="booking-format">{title}</h6>
      <ul>
        {policy.map((item, idx) => (
          <li className="note" key={idx}>
            {item}
          </li>
        ))}
      </ul>
    </div>
  );
};

export default BookingPolicy;
