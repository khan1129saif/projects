let boxes = document.querySelectorAll(".box");
let resetbtn = document.querySelector(".reset-btn");
let newbtn = document.querySelector(".newgame");
let turn = "O";
let msg = document.querySelector(".msg");
document.querySelector("h1").after(msg);
resetbtn.after(newbtn);

const showwinner = (winner) => {
  msg.innerText = `Congratulations! The winner is ${winner}`;
};

const Drawn = () => {
  msg.innerText = "Match Draw";
};

const checkwinner = () => {
  let hasWinner = false;

  for (let pattern of winpatterns) {
    let posval1 = boxes[pattern[0]].innerText;
    let posval2 = boxes[pattern[1]].innerText;
    let posval3 = boxes[pattern[2]].innerText;

    if (posval1 !== "" && posval2 !== "" && posval3 !== "") {
      if (posval1 === posval2 && posval2 === posval3) {
        console.log("winner", posval1);
        showwinner(posval1);
        hasWinner = true;
        break;
      }
    }
  }

  if (!hasWinner) {
    let isDraw = true;
    for (let i = 0; i < boxes.length; i++) {
      if (boxes[i].innerText === "") {
        isDraw = false;
        break;
      }
    }

    if (isDraw) {
      console.log("Draw");
      Drawn();
    }
  }
};

const winpatterns = [
  [0, 1, 2],
  [3, 4, 5],
  [6, 7, 8],
  [0, 3, 6],
  [1, 4, 7],
  [2, 5, 8],
  [0, 4, 8],
  [2, 4, 6],
];

boxes.forEach((box) => {
  box.addEventListener("click", () => {
    if (box.innerText === "") {
      if (turn === "O") {
        box.style.color = "black";
        box.innerText = "O";
        turn = "X";
      } else {
        box.style.color = "rgb(150, 53, 53)";
        box.innerText = "X";
        turn = "O";
      }
      checkwinner();
      box.disabled = true;
    }
  });
});

resetbtn.addEventListener("click", () => {
  boxes.forEach((box) => {
    box.innerText = "";
    box.disabled = false;
    box.style.color = "inherit";
  });
  msg.innerText = "";
  turn = "O";
});

newbtn.addEventListener("click", () => {
  boxes.forEach((box) => {
    box.innerText = "";
    box.disabled = false;
    box.style.color = "inherit";
  });
  msg.innerText = "";
  turn = "O";
});