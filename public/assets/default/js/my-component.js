'use strict';

function MyComponent() {
  // You can use JSX here thanks to Babel
  return (
    <div>
      <h2>Hello from React!</h2>
      <p>This is a simple component.</p>
      <button className="btn btn-success">Button example</button>
    </div>
  );
}

const domContainer = document.querySelector('#react-container');
const root = ReactDOM.createRoot(domContainer); // Use createRoot for React 18+
root.render(<MyComponent />);