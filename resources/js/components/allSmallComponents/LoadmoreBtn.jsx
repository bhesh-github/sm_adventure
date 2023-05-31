import React from "react";
import { FiChevronsDown, FiChevronsUp } from "react-icons/fi";

const LoadmoreBtn = ({ ifMoreContain }) => {
  const arrowIcon = ifMoreContain ? (
    <button className="loadmore-btn ">
      Show More{<FiChevronsDown className="loadmore-icon" />}
    </button>
  ) : (
    <button className="loadmore-btn">
      Show Less{<FiChevronsUp className="loadmore-icon" />}
    </button>
  );
  return arrowIcon;
};

export default LoadmoreBtn;

LoadmoreBtn.defaultProps = {
  ifMoreContain: true,
};
