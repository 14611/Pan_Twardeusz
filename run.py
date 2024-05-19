from flask import Flask, render_template

app = Flask(__name__)


@app.route('/')
def index():
    return render_template("index.html")

@app.route('/book/<number>')
def book(number):
    return render_template(f"k{number}.html")
if __name__ == '__main__':
    app.run(debug=True)