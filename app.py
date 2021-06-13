from flask import Flask, render_template, request, url_for
from datetime import datetime
import os
import uuid


app = Flask(__name__)


# ----------practice start------------
@app.route('/')
def index():
    return render_template("project.html")

@app.route('/members')
def members():
    return render_template("aboutus.html")
# ----------practice end--------------


if __name__ == "__main__":
    app.run(debug=True)


